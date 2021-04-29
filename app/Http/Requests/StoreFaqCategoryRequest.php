<?php

namespace App\Http\Requests;

use App\Models\FaqCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFaqCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faq_category_create');
    }

    public function rules()
    {
        return [
            'faq_category' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
        ];
    }
}
