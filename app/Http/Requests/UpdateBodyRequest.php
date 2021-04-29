<?php

namespace App\Http\Requests;

use App\Models\Body;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBodyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('body_edit');
    }

    public function rules()
    {
        return [
            'body' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
        ];
    }
}
