<?php

namespace App\Http\Requests;

use App\Models\MotoEngine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotoEngineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_engine_create');
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
