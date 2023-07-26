<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'slider_url'=>'required',
            'status' => 'required',
            'screen' => 'required',
            'image' => 'required|image|max:2048|dimensions:min_width=800,min_height=600,max_width=1200,max_height=900',
        ];
    }
}
