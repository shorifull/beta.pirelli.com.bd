<?php

namespace App\Http\Requests;

use App\Models\ProductSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_size_edit');
    }

    public function rules()
    {
        return [
            'size' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
