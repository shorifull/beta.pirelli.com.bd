<?php

namespace App\Http\Requests;

use App\Models\CarSlider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_slider_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'button_label' => [
                'string',
                'min:1',
                'max:255',
                'nullable',
            ],
            'button_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
