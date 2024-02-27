<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRetailerRequest;
use App\Http\Requests\StoreRetailerRequest;
use App\Http\Requests\UpdateRetailerRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Retailer;
use App\Models\VehicleType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class RetailerController extends Controller

{

    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('retailer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retailers = Retailer::with(['vehicle_type', 'city'])->get();

        return view('admin.retailers.index', compact('retailers'));
    }

    public function create()
    {
        abort_if(Gate::denies('retailer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('category', 'id');

        $vehicle_types = VehicleType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.retailers.create', compact('categories','vehicle_types', 'cities'));
    }

    public function store(StoreRetailerRequest $request)
    {
        $retailer = Retailer::create($request->all());


        if ($request->input('banner', false)) {
            $retailer->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $retailer->id]);
        }


        return redirect()->route('admin.retailers.index');
    }

    public function edit(Retailer $retailer)
    {
        abort_if(Gate::denies('retailer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('category', 'id');

        $vehicle_types = VehicleType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retailer->load('vehicle_type', 'city');

        return view('admin.retailers.edit', compact('categories','vehicle_types', 'cities', 'retailer'));
    }

    public function update(UpdateRetailerRequest $request, Retailer $retailer)
    {



        if(!$request->active){
            $request->merge([
                'active' => 0
            ]);
        }

        $retailer->update($request->all());

        if ($request->input('banner', false)) {
            if (!$retailer->banner || $request->input('banner') !== $retailer->banner->file_name) {
                if ($retailer->banner) {
                    $retailer->banner->delete();
                }
                $retailer->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
            }
        } elseif ($retailer->banner) {
            $retailer->banner->delete();
        }



        return redirect()->route('admin.retailers.index');
    }

    public function show(Retailer $retailer)
    {
        abort_if(Gate::denies('retailer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retailer->load('vehicle_type', 'city');

        return view('admin.retailers.show', compact('retailer'));
    }
    public function destroy(Retailer $retailer)
    {
        abort_if(Gate::denies('retailer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $retailer->delete();

        return back();
    }

    public function massDestroy(MassDestroyRetailerRequest $request)
    {
        Retailer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('retailer_create') && Gate::denies('retailer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Retailer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
