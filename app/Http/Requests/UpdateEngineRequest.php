<?php

namespace App\Http\Requests;

use App\Models\Engine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEngineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('engine_edit');
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
