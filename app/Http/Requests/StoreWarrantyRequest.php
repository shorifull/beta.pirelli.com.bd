<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarrantyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'city' => 'required',
            'zip' => 'required|numeric',
            'date_purchased' => 'required',
            'invoice_number' => 'required',
            'product_name' => 'required',
            'product_size' => 'required',
            'product_dot' => 'required',
            'quantity_purchased' => 'required|numeric',
            'retailer_name' => 'required|string',
            'terms' => 'required',
            'invoice_attachment' => 'required'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email Address',
            'phone' => 'Phone Number',
            'city' => 'City',
            'zip' => 'Zip Code',
            'date_purchased' => 'Date Purchased',
            'invoice_number' => 'Invoice Number',
            'product_name' => 'Product Name',
            'product_size' => 'Product Size',
            'product_dot' => 'Product DOT',
            'quantity_purchased' => 'Quantity Purchased',
            'retailer_name' => 'Retailer Name',
            'terms' => 'Terms & Conditions',
            'subscribed' => 'Subscribe To'
        ];
    }

}
