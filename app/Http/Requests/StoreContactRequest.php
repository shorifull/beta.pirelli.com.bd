<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],

            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'string',
                'min:10',
                'max:255',


            ],
            'subject' => [
                'required',
                'string',
                'min:1',
                'max:255',

            ],

            'message' => [
                'required',
                'string',

            ],


        ];
    }
}
