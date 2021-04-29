<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PageMenu;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPageMenuRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('page_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:page_menus,id',
]
    
}

}