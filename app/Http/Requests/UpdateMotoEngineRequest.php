<?php

namespace App\Http\Requests;

use App\Models\MotoEngine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMotoEngineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_engine_edit');
    }

    public function rules()
    {
        return [
            'engine' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
        ];
    }
}
