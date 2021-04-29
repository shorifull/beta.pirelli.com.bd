<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMotoRegistrationRequest;
use App\Http\Requests\StoreMotoRegistrationRequest;
use App\Http\Requests\UpdateMotoRegistrationRequest;
use App\Models\City;
use App\Models\MotoRegistration;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Retailer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MotoRegistrationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('moto_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoRegistrations = MotoRegistration::with(['city', 'product_name', 'product_size', 'retailer', 'media'])->get();

        return view('admin.motoRegistrations.index', compact('motoRegistrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('moto_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_names = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_sizes = ProductSize::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retailers = Retailer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.motoRegistrations.create', compact('cities', 'product_names', 'product_sizes', 'retailers'));
    }

    public function store(StoreMotoRegistrationRequest $request)
    {
        $motoRegistration = MotoRegistration::create($request->all());

        if ($request->input('invoice_attachment', false)) {
            $motoRegistration->addMedia(storage_path('tmp/uploads/' . basename($request->input('invoice_attachment'))))->toMediaCollection('invoice_attachment');
        }

        foreach ($request->input('photos', []) as $file) {
            $motoRegistration->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $motoRegistration->id]);
        }

        return redirect()->route('admin.moto-registrations.index');
    }

    public function edit(MotoRegistration $motoRegistration)
    {
        abort_if(Gate::denies('moto_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_names = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_sizes = ProductSize::all()->pluck('size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $retailers = Retailer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $motoRegistration->load('city', 'product_name', 'product_size', 'retailer');

        return view('admin.motoRegistrations.edit', compact('cities', 'product_names', 'product_sizes', 'retailers', 'motoRegistration'));
    }

    public function update(UpdateMotoRegistrationRequest $request, MotoRegistration $motoRegistration)
    {
        $motoRegistration->update($request->all());

        if ($request->input('invoice_attachment', false)) {
            if (!$motoRegistration->invoice_attachment || $request->input('invoice_attachment') !== $motoRegistration->invoice_attachment->file_name) {
                if ($motoRegistration->invoice_attachment) {
                    $motoRegistration->invoice_attachment->delete();
                }
                $motoRegistration->addMedia(storage_path('tmp/uploads/' . basename($request->input('invoice_attachment'))))->toMediaCollection('invoice_attachment');
            }
        } elseif ($motoRegistration->invoice_attachment) {
            $motoRegistration->invoice_attachment->delete();
        }

        if (count($motoRegistration->photos) > 0) {
            foreach ($motoRegistration->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $motoRegistration->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $motoRegistration->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.moto-registrations.index');
    }

    public function show(MotoRegistration $motoRegistration)
    {
        abort_if(Gate::denies('moto_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoRegistration->load('city', 'product_name', 'product_size', 'retailer');

        return view('admin.motoRegistrations.show', compact('motoRegistration'));
    }

    public function destroy(MotoRegistration $motoRegistration)
    {
        abort_if(Gate::denies('moto_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoRegistration->delete();

        return back();
    }

    public function massDestroy(MassDestroyMotoRegistrationRequest $request)
    {
        MotoRegistration::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('moto_registration_create') && Gate::denies('moto_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MotoRegistration();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
