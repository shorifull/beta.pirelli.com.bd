<?php

namespace App\Http\Requests;

use App\Models\MotoModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotoModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_model_create');
    }

    public function rules()
    {
        return [
            'model' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'moto_brand_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
