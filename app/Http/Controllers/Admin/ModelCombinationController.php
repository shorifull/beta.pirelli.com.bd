<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyModelCombinationRequest;
use App\Http\Requests\StoreModelCombinationRequest;
use App\Http\Requests\UpdateModelCombinationRequest;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Chassis;
use App\Models\Engine;
use App\Models\ModelCombination;
use App\Models\Year;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModelCombinationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('model_combination_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modelCombinations = ModelCombination::with(['brand', 'car_model', 'years', 'engine', 'chassis'])->get();

        return view('admin.modelCombinations.index', compact('modelCombinations'));
    }

    public function create()
    {
        abort_if(Gate::denies('model_combination_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_models = CarModel::all()->pluck('model', 'id')->prepend(trans('global.pleaseSelect'), '');

        $years = Year::all()->pluck('year', 'id');

        $engines = Engine::all()->pluck('engine', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chassis = Chassis::all()->pluck('chassis', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.modelCombinations.create', compact('brands', 'car_models', 'years', 'engines', 'chassis'));
    }

    public function store(StoreModelCombinationRequest $request)
    {
        $modelCombination = ModelCombination::create($request->all());
        $modelCombination->years()->sync($request->input('years', []));

        return redirect()->route('admin.model-combinations.index');
    }

    public function edit(ModelCombination $modelCombination)
    {
        abort_if(Gate::denies('model_combination_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_models = CarModel::all()->pluck('model', 'id')->prepend(trans('global.pleaseSelect'), '');

        $years = Year::all()->pluck('year', 'id');

        $engines = Engine::all()->pluck('engine', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chassis = Chassis::all()->pluck('chassis', 'id')->prepend(trans('global.pleaseSelect'), '');

        $modelCombination->load('brand', 'car_model', 'years', 'engine', 'chassis');

        return view('admin.modelCombinations.edit', compact('brands', 'car_models', 'years', 'engines', 'chassis', 'modelCombination'));
    }

    public function update(UpdateModelCombinationRequest $request, ModelCombination $modelCombination)
    {


        $modelCombination->update($request->all());
        $modelCombination->years()->sync($request->input('years', []));

        return redirect()->route('admin.model-combinations.index');
    }

    public function show(ModelCombination $modelCombination)
    {
        abort_if(Gate::denies('model_combination_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modelCombination->load('brand', 'car_model', 'years', 'engine', 'chassis');

        return view('admin.modelCombinations.show', compact('modelCombination'));
    }

    public function destroy(ModelCombination $modelCombination)
    {
        abort_if(Gate::denies('model_combination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modelCombination->delete();

        return back();
    }

    public function massDestroy(MassDestroyModelCombinationRequest $request)
    {
        ModelCombination::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getModelsByMake(Request $request)
    {
        if(!isset($request->make_id)) {
            return response()->json(null, 404);
        }

        $models = Model::where('make_id', $request->make_id)->orderBy('name')->get();

        $models->values()->all();

        return $models;
    }

    public function getYears(Request $request)
    {
        if(!isset($request->model_id)) {
            return response()->json(null, 404);
        }

        $years = Year::pluck('id', 'name');

        return  response()->json($years, 200);
    }

    public function getYearsByModel(Request $request)
    {
        $modelId = $request->model_id;

        $years =  Year::whereHas(
            'modelCombinations', function($q) use($modelId) {
            $q->where(['model_id' => $modelId]);
        }
        )->get();

        return $years;
    }

    public function getEnginesByYear(Request $request)
    {
        $modelId = $request->model_id;
        $yearId = $request->year_id;

        $engines =  Engine::whereHas('modelCombination', function($q) use($modelId) {
            $q->where(['model_id' => $modelId]);
        })->whereHas(
            'modelCombination.years', function($q) use($yearId) {
            $q->where(['id' => $yearId]);
        }
        )->get();

        return $engines;
    }
}
