<?php

namespace App\Http\Requests;

use App\Models\Tyre;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTyreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tyre_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'model_combinations.*' => [
                'integer',
            ],
            'model_combinations' => [
                'array',
            ],
            'categoys.*' => [
                'integer',
            ],
            'categoys' => [
                'array',
            ],
        ];
    }
}