<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHeaderRequest;
use App\Http\Requests\UpdateHeaderRequest;
use App\Http\Resources\Admin\HeaderResource;
use App\Models\Header;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HeaderApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('header_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HeaderResource(Header::all());
    }

    public function store(StoreHeaderRequest $request)
    {
        $header = Header::create($request->all());

        if ($request->input('favicon', false)) {
            $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
        }

        if ($request->input('logo', false)) {
            $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        return (new HeaderResource($header))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Header $header)
    {
        abort_if(Gate::denies('header_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HeaderResource($header);
    }

    public function update(UpdateHeaderRequest $request, Header $header)
    {
        $header->update($request->all());

        if ($request->input('favicon', false)) {
            if (!$header->favicon || $request->input('favicon') !== $header->favicon->file_name) {
                if ($header->favicon) {
                    $header->favicon->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
            }
        } elseif ($header->favicon) {
            $header->favicon->delete();
        }

        if ($request->input('logo', false)) {
            if (!$header->logo || $request->input('logo') !== $header->logo->file_name) {
                if ($header->logo) {
                    $header->logo->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($header->logo) {
            $header->logo->delete();
        }

        return (new HeaderResource($header))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Header $header)
    {
        abort_if(Gate::denies('header_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $header->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
