<?php

namespace App\Http\Requests;

use App\Models\MotoRatio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMotoRatioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_ratio_edit');
    }

    public function rules()
    {
        return [
            'ratio' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
