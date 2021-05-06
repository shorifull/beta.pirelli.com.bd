<?php

namespace App\Http\Requests;

use App\Models\ModelCombination;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreModelCombinationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('model_combination_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'brand_id' => [
                'required',
                'integer',
            ],
            'years.*' => [
                'integer',
            ],
            'years' => [
                'required',
                'array',
            ],
            'engine_id' => [
                'required',
                'integer',
            ],
            'chassis_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
