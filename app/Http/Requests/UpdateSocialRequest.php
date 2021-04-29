<?php

namespace App\Http\Requests;

use App\Models\Social;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSocialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_edit');
    }

    public function rules()
    {
        return [
            'facebook' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'twitter' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'linked_in' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'google_plus' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'pinterest' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'you_tube' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'instagram' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'tumblr' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'flickr' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'reddit' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'snapchat' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'whats_app' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'quora' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
        ];
    }
}
