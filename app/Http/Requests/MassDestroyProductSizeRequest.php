<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ProductSize;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductSizeRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('product_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:product_sizes,id',
]
    
}

}