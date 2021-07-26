<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'phone' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'subject' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
        ];
    }
}
