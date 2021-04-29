<?php

namespace App\Http\Requests;

use App\Models\Fuel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFuelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fuel_edit');
    }

    public function rules()
    {
        return [
            'fuel' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
        ];
    }
}
