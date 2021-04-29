<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\WarrantyClaim;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWarrantyClaimRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('warranty_claim_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:warranty_claims,id',
]
    
}

}