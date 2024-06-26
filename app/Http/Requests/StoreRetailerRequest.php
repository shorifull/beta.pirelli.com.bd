<?php

namespace App\Http\Requests;

use App\Models\Retailer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRetailerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('retailer_create');
    }

    public function rules()
    {
        return [
            'vehicle_type_id' => [
                'required',
                'integer',
            ],
            'phone' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'name' => [
                'string',
                'min:1',
                'max:255',
                'required',
                'unique:retailers',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'array',
            ],

            'city_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
