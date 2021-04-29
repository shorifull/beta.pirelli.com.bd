<?php

namespace App\Http\Requests;

use App\Models\Width;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWidthRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('width_create');
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
