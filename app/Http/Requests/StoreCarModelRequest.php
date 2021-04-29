<?php

namespace App\Http\Requests;

use App\Models\CarModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_model_create');
    }

    public function rules()
    {
        return [
            'brand_id' => [
                'required',
                'integer',
            ],
            'model' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
        ];
    }
}
