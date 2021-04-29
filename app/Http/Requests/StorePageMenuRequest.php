<?php

namespace App\Http\Requests;

use App\Models\PageMenu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePageMenuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_menu_create');
    }

    public function rules()
    {
        return [
            'page_id' => [
                'required',
                'integer',
            ],
            'order' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:page_menus,order',
            ],
        ];
    }
}
