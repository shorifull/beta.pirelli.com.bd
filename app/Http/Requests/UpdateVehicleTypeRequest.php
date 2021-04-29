<?php

namespace App\Http\Requests;

use App\Models\VehicleType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:1',
                'max:255',
                'required',
                'unique:vehicle_types,name,' . request()->route('vehicle_type')->id,
            ],
            'slug' => [
                'string',
                'min:1',
                'max:255',
                'required',
                'unique:vehicle_types,slug,' . request()->route('vehicle_type')->id,
            ],
        ];
    }
}
