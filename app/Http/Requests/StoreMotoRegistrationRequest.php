<?php

namespace App\Http\Requests;

use App\Models\MotoRegistration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMotoRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('moto_registration_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'last_name' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'city_id' => [
                'required',
                'integer',
            ],
            'zip' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'address' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'date_purchased' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'invoice_number' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
//            'invoice_attachment' => [
//                'required',
//            ],
            'product_name_id' => [
                'required',
                'integer',
            ],
            'product_size_id' => [
                'required',
                'integer',
            ],
            'product_dot' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'product_quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
