<?php

namespace App\Http\Requests;

use App\Models\Faq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFaqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faq_edit');
    }

    public function rules()
    {
        return [
            'faq_title' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'faq_content' => [
                'required',
            ],
            'faq_category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
