<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarSliderRequest;
use App\Http\Requests\StoreCarSliderRequest;
use App\Http\Requests\UpdateCarSliderRequest;
use App\Models\CarSlider;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarSliderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carSliders = CarSlider::with(['media'])->get();

        return view('admin.carSliders.index', compact('carSliders'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_slider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carSliders.create');
    }

    public function store(StoreCarSliderRequest $request)
    {
        $carSlider = CarSlider::create($request->all());

        if ($request->input('image', false)) {
            $carSlider->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carSlider->id]);
        }

        return redirect()->route('admin.car-sliders.index');
    }

    public function edit(CarSlider $carSlider)
    {
        abort_if(Gate::denies('car_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carSliders.edit', compact('carSlider'));
    }

    public function update(UpdateCarSliderRequest $request, CarSlider $carSlider)
    {
        $carSlider->update($request->all());

        if ($request->input('image', false)) {
            if (!$carSlider->image || $request->input('image') !== $carSlider->image->file_name) {
                if ($carSlider->image) {
                    $carSlider->image->delete();
                }
                $carSlider->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($carSlider->image) {
            $carSlider->image->delete();
        }

        return redirect()->route('admin.car-sliders.index');
    }

    public function show(CarSlider $carSlider)
    {
        abort_if(Gate::denies('car_slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carSliders.show', compact('carSlider'));
    }

    public function destroy(CarSlider $carSlider)
    {
        abort_if(Gate::denies('car_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carSlider->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarSliderRequest $request)
    {
        CarSlider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_slider_create') && Gate::denies('car_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CarSlider();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
