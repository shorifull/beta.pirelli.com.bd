<?php

namespace App\Http\Requests;

use App\Models\MotoTyre;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotoTyreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_tyre_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            
            'pattern' => [
                'required',
                'integer',
            ],
            'moto_brand_id' => [
                'required',
                'integer',
            ],
            'moto_model_id' => [
                'required',
                'integer',
            ],
            'moto_engine_id' => [
                'required',
                'integer',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
            ],
        ];
    }
}
