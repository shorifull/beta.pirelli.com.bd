<?php

namespace App\Http\Requests;

use App\Models\MotoBrand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotoBrandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_brand_create');
    }

    public function rules()
    {
        return [
            'brand' => [
                'string',
                'min:1',
                'max:255',
                'required',
                'unique:moto_brands',
            ],
        ];
    }
}
