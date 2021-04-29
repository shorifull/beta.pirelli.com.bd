<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMotoRegistrationRequest;
use App\Http\Requests\UpdateMotoRegistrationRequest;
use App\Http\Resources\Admin\MotoRegistrationResource;
use App\Models\MotoRegistration;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotoRegistrationApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('moto_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotoRegistrationResource(MotoRegistration::with(['city', 'product_name', 'product_size', 'retailer'])->get());
    }

    public function store(StoreMotoRegistrationRequest $request)
    {
        $motoRegistration = MotoRegistration::create($request->all());

        if ($request->input('invoice_attachment', false)) {
            $motoRegistration->addMedia(storage_path('tmp/uploads/' . basename($request->input('invoice_attachment'))))->toMediaCollection('invoice_attachment');
        }

        if ($request->input('photos', false)) {
            $motoRegistration->addMedia(storage_path('tmp/uploads/' . basename($request->input('photos'))))->toMediaCollection('photos');
        }

        return (new MotoRegistrationResource($motoRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MotoRegistration $motoRegistration)
    {
        abort_if(Gate::denies('moto_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MotoRegistrationResource($motoRegistration->load(['city', 'product_name', 'product_size', 'retailer']));
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

        if ($request->input('photos', false)) {
            if (!$motoRegistration->photos || $request->input('photos') !== $motoRegistration->photos->file_name) {
                if ($motoRegistration->photos) {
                    $motoRegistration->photos->delete();
                }
                $motoRegistration->addMedia(storage_path('tmp/uploads/' . basename($request->input('photos'))))->toMediaCollection('photos');
            }
        } elseif ($motoRegistration->photos) {
            $motoRegistration->photos->delete();
        }

        return (new MotoRegistrationResource($motoRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MotoRegistration $motoRegistration)
    {
        abort_if(Gate::denies('moto_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $motoRegistration->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
