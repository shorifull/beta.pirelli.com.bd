<?php

namespace App\Http\Requests;

use App\Models\Footer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFooterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('footer_create');
    }

    public function rules()
    {
        return [
            'footer_copyright' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
        ];
    }
}
