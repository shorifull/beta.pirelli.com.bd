<?php

namespace App\Http\Requests;

use App\Models\MotoBrand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMotoBrandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_brand_edit');
    }

    public function rules()
    {
        return [
            'brand' => [
                'string',
                'min:1',
                'max:255',
                'required',
                'unique:moto_brands,brand,' . request()->route('moto_brand')->id,
            ],
        ];
    }
}
