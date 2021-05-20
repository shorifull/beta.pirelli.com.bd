<?php

namespace App\Http\Requests;

use App\Models\MotoWidth;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMotoWidthRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('moto_width_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:moto_widths,id',
        ];
    }
}
