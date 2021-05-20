<?php

namespace App\Http\Requests;

use App\Models\MotoTyre;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMotoTyreRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('moto_tyre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:moto_tyres,id',
        ];
    }
}
