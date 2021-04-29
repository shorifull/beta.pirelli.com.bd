<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CarSlider;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarSliderRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('car_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:car_sliders,id',
]
    
}

}