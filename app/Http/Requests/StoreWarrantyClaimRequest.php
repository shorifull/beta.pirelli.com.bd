<?php

namespace App\Http\Requests;

use App\Models\WarrantyClaim;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWarrantyClaimRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('warranty_claim_create');
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'city' => 'required',
            'zip' => 'required|numeric',
            'invoice_number' => [
                'string',
                'min:1',
                'max:999999',
                'required',
            ],
            'terms' => 'required',
            'invoice_attachment' => 'required',
            'product_name_id' => [
                'required',
                'integer',
            ],
            'product_size_id' => [
                'required',
                'integer',
            ],
            'retailer_id' => 'required',

        ];
    }
}
