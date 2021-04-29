<?php

namespace App\Http\Requests;

use App\Models\Chassis;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreChassisRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chassis_create');
    }

    public function rules()
    {
        return [
            'chassis' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
        ];
    }
}
