<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CarRegistration;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarRegistrationRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('car_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:car_registrations,id',
]
    
}

}