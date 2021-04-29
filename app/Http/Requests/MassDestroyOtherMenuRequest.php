<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\OtherMenu;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOtherMenuRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('other_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:other_menus,id',
]
    
}

}