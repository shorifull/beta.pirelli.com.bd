<?php

namespace App\Http\Controllers;

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

class ModelCombinationSearchController extends Controller
{
    public function getModelsByBrand(Request $request)
    {
        if(!isset($request->brand_id)) {
            return response()->json(null, 404);
        }

        $models = CarModel::where('brand_id', $request->brand_id)->orderBy('model')->get();

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
        $model_id = $request->model_id;

        $years =  Year::whereHas(
            'modelCombinations', function($q) use($model_id) {
            $q->where(['car_model_id' => $model_id]);
        }
        )->get();

        return $years;
    }



    public function getEnginesByYear(Request $request)
    {
        $modelId = $request->model_id;
        $yearId = $request->year_id;

        $engines =  Engine::whereHas('modelCombinations', function($q) use($modelId) {
            $q->where(['car_model_id' => $modelId]);
        })->whereHas(
            'modelCombinations.years', function($q) use($yearId) {
            $q->where(['id' => $yearId]);
        }
        )->get();

        return $engines;
    }
}
