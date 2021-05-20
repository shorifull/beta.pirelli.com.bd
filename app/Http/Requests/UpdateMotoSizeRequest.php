<?php

namespace App\Http\Requests;

use App\Models\MotoSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMotoSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_size_edit');
    }

    public function rules()
    {
        return [
            'size' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
