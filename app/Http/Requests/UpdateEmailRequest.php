<?php

namespace App\Http\Requests;

use App\Models\Email;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_edit');
    }

    public function rules()
    {
        return [
            'send_email_from' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'receive_email_to' => [
                'string',
                'nullable',
            ],
            'smtp_host' => [
                'string',
                'nullable',
            ],
            'smtp_port' => [
                'string',
                'nullable',
            ],
            'smtp_username' => [
                'string',
                'nullable',
            ],
            'smtp_password' => [
                'string',
                'nullable',
            ],
        ];
    }
}
