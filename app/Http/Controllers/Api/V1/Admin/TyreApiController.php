<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTyreRequest;
use App\Http\Requests\UpdateTyreRequest;
use App\Http\Resources\Admin\TyreResource;
use App\Models\Tyre;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TyreApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tyre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TyreResource(Tyre::with(['model_combinations', 'categoys', 'width', 'ratio', 'size'])->get());
    }

    public function store(StoreTyreRequest $request)
    {
        $tyre = Tyre::create($request->all());
        $tyre->model_combinations()->sync($request->input('model_combinations', []));
        $tyre->categoys()->sync($request->input('categoys', []));
        if ($request->input('thumbnail', false)) {
            $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumbnail'))))->toMediaCollection('thumbnail');
        }

        if ($request->input('banner', false)) {
            $tyre->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
        }

        return (new TyreResource($tyre))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tyre $tyre)
    {
        abort_if(Gate::denies('tyre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TyreResource($tyre->load(['model_combinations', 'categoys', 'width', 'ratio', 'size']));
    }

    public function update(UpdateTyreRequest $request, Tyre $tyre)
    {
        $tyre->update($request->all());
        $tyre->model_combinations()->sync($request->input('model_combinations', []));
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

        return (new TyreResource($tyre))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tyre $tyre)
    {
        abort_if(Gate::denies('tyre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tyre->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
