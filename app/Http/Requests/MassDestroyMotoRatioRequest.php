<?php

namespace App\Http\Requests;

use App\Models\MotoRatio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMotoRatioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('moto_ratio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:moto_ratios,id',
        ];
    }
}
