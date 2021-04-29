<?php

namespace App\Http\Requests;

use App\Models\Retailer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRetailerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('retailer_edit');
    }

    public function rules()
    {
        return [
            'vehicle_type_id' => [
                'required',
                'integer',
            ],
            'shop_name' => [
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
                'unique:retailers,name,' . request()->route('retailer')->id,
            ],
            'city_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
