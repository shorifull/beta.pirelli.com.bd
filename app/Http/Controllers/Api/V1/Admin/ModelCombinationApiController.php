<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelCombinationRequest;
use App\Http\Requests\UpdateModelCombinationRequest;
use App\Http\Resources\Admin\ModelCombinationResource;
use App\Models\ModelCombination;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModelCombinationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('model_combination_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ModelCombinationResource(ModelCombination::with(['brand', 'car_model', 'years', 'engine', 'chassis'])->get());
    }

    public function store(StoreModelCombinationRequest $request)
    {
        $modelCombination = ModelCombination::create($request->all());
        $modelCombination->years()->sync($request->input('years', []));

        return (new ModelCombinationResource($modelCombination))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ModelCombination $modelCombination)
    {
        abort_if(Gate::denies('model_combination_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ModelCombinationResource($modelCombination->load(['brand', 'car_model', 'years', 'engine', 'chassis']));
    }

    public function update(UpdateModelCombinationRequest $request, ModelCombination $modelCombination)
    {
        $modelCombination->update($request->all());
        $modelCombination->years()->sync($request->input('years', []));

        return (new ModelCombinationResource($modelCombination))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ModelCombination $modelCombination)
    {
        abort_if(Gate::denies('model_combination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modelCombination->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
