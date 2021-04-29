<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTyreRequest;
use App\Http\Requests\StoreTyreRequest;
use App\Http\Requests\UpdateTyreRequest;
use App\Models\Body;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Chassis;
use App\Models\Engine;
use App\Models\Fuel;
use App\Models\Ratio;
use App\Models\Size;
use App\Models\Transmission;
use App\Models\Tyre;
use App\Models\Width;
use App\Models\Year;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TyreController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tyre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tyres = Tyre::with(['brand', 'models', 'body', 'categoys', 'fuel', 'transmission', 'engine', 'chassis', 'year', 'width', 'ratio', 'size', 'media'])->get();

        return view('admin.tyres.index', compact('tyres'));
    }

    public function create()
    {
        abort_if(Gate::denies('tyre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $models = CarModel::all()->pluck('model', 'id');

        $bodies = Body::all()->pluck('body', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categoys = Category::all()->pluck('category', 'id');

        $fuels = Fuel::all()->pluck('fuel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transmissions = Transmission::all()->pluck('transmission', 'id')->prepend(trans('global.pleaseSelect'), '');

        $engines = Engine::all()->pluck('engine', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chassis = Chassis::all()->pluck('chassis', 'id')->prepend(trans('global.pleaseSelect'), '');

        $years = Year::all()->pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        $widths = Width::all()->pluck('width', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ratios = Ratio::all()->pluck('ratio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::all()->pluck('with', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tyres.create', compact('brands', 'models', 'bodies', 'categoys', 'fuels', 'transmissions', 'engines', 'chassis', 'years', 'widths', 'ratios', 'sizes'));
    }

    public function store(StoreTyreRequest $request)
    {
        $tyre = Tyre::create($request->all());
        $tyre->models()->sync($request->input('models', []));
        $tyre->categoys()->sync($request->input('categoys', []));
        if ($request->input('thumbnail', false)) {
            $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumbnail'))))->toMediaCollection('thumbnail');
        }

        if ($request->input('banner', false)) {
            $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tyre->id]);
        }

        return redirect()->route('admin.tyres.index');
    }

    public function edit(Tyre $tyre)
    {
        abort_if(Gate::denies('tyre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $models = CarModel::all()->pluck('model', 'id');

        $bodies = Body::all()->pluck('body', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categoys = Category::all()->pluck('category', 'id');

        $fuels = Fuel::all()->pluck('fuel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transmissions = Transmission::all()->pluck('transmission', 'id')->prepend(trans('global.pleaseSelect'), '');

        $engines = Engine::all()->pluck('engine', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chassis = Chassis::all()->pluck('chassis', 'id')->prepend(trans('global.pleaseSelect'), '');

        $years = Year::all()->pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        $widths = Width::all()->pluck('width', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ratios = Ratio::all()->pluck('ratio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::all()->pluck('with', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tyre->load('brand', 'models', 'body', 'categoys', 'fuel', 'transmission', 'engine', 'chassis', 'year', 'width', 'ratio', 'size');

        return view('admin.tyres.edit', compact('brands', 'models', 'bodies', 'categoys', 'fuels', 'transmissions', 'engines', 'chassis', 'years', 'widths', 'ratios', 'sizes', 'tyre'));
    }

    public function update(UpdateTyreRequest $request, Tyre $tyre)
    {
        $tyre->update($request->all());
        $tyre->models()->sync($request->input('models', []));
        $tyre->categoys()->sync($request->input('categoys', []));
        if ($request->input('thumbnail', false)) {
            if (!$tyre->thumbnail || $request->input('thumbnail') !== $tyre->thumbnail->file_name) {
                if ($tyre->thumbnail) {
                    $tyre->thumbnail->delete();
                }
                $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumbnail'))))->toMediaCollection('thumbnail');
            }
        } elseif ($tyre->thumbnail) {
            $tyre->thumbnail->delete();
        }

        if ($request->input('banner', false)) {
            if (!$tyre->banner || $request->input('banner') !== $tyre->banner->file_name) {
                if ($tyre->banner) {
                    $tyre->banner->delete();
                }
                $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
            }
        } elseif ($tyre->banner) {
            $tyre->banner->delete();
        }

        return redirect()->route('admin.tyres.index');
    }

    public function show(Tyre $tyre)
    {
        abort_if(Gate::denies('tyre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tyre->load('brand', 'models', 'body', 'categoys', 'fuel', 'transmission', 'engine', 'chassis', 'year', 'width', 'ratio', 'size');

        return view('admin.tyres.show', compact('tyre'));
    }

    public function destroy(Tyre $tyre)
    {
        abort_if(Gate::denies('tyre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tyre->delete();

        return back();
    }

    public function massDestroy(MassDestroyTyreRequest $request)
    {
        Tyre::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tyre_create') && Gate::denies('tyre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Tyre();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
