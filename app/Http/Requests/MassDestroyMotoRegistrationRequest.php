<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\MotoRegistration;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMotoRegistrationRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('moto_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:moto_registrations,id',
]
    
}

}