<?php

namespace App\Http\Requests;

use App\Models\OtherMenu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOtherMenuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('other_menu_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'url' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
        ];
    }
}
