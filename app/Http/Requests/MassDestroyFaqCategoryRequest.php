<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\FaqCategory;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFaqCategoryRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('faq_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:faq_categories,id',
]
    
}

}