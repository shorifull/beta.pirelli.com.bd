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
            'invoice_number' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'product_name_id' => [
                'required',
                'integer',
            ],
            'product_size_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
