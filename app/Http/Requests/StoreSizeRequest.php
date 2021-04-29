<?php

namespace App\Http\Requests;

use App\Models\Size;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('size_create');
    }

    public function rules()
    {
        return [
            'with' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
