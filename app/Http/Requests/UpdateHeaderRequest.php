<?php

namespace App\Http\Requests;

use App\Models\Header;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('header_edit');
    }

    public function rules()
    {
        return [
            'meta_title' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
        ];
    }
}
