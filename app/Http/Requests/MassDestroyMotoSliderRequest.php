<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\MotoSlider;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMotoSliderRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('moto_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:moto_sliders,id',
]
    
}

}