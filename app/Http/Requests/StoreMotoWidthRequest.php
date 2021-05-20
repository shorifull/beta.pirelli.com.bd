<?php

namespace App\Http\Requests;

use App\Models\MotoWidth;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotoWidthRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_width_create');
    }

    public function rules()
    {
        return [
            'width' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
