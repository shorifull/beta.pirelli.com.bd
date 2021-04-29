<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMotoSliderRequest;
use App\Http\Requests\StoreMotoSliderRequest;
use App\Http\Requests\UpdateMotoSliderRequest;
use App\Models\MotoSlider;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MotoSliderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('moto_slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoSliders = MotoSlider::with(['media'])->get();

        return view('admin.motoSliders.index', compact('motoSliders'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_slider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoSliders.create');
    }

    public function store(StoreMotoSliderRequest $request)
    {
        $motoSlider = MotoSlider::create($request->all());

        if ($request->input('image', false)) {
            $motoSlider->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $motoSlider->id]);
        }

        return redirect()->route('admin.moto-sliders.index');
    }

    public function edit(MotoSlider $motoSlider)
    {
        abort_if(Gate::denies('moto_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoSliders.edit', compact('motoSlider'));
    }

    public function update(UpdateMotoSliderRequest $request, MotoSlider $motoSlider)
    {
        $motoSlider->update($request->all());

        if ($request->input('image', false)) {
            if (!$motoSlider->image || $request->input('image') !== $motoSlider->image->file_name) {
                if ($motoSlider->image) {
                    $motoSlider->image->delete();
                }
                $motoSlider->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($motoSlider->image) {
            $motoSlider->image->delete();
        }

        return redirect()->route('admin.moto-sliders.index');
    }

    public function show(MotoSlider $motoSlider)
    {
        abort_if(Gate::denies('moto_slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.motoSliders.show', compact('motoSlider'));
    }

    public function destroy(MotoSlider $motoSlider)
    {
        abort_if(Gate::denies('moto_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoSlider->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoSliderRequest $request)
    {
        MotoSlider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('moto_slider_create') && Gate::denies('moto_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MotoSlider();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
