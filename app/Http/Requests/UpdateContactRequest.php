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
            'contact_email' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'contact_phone_number' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'contact_fax_number' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
        ];
    }
}
