<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
            'name_en' => 'required|max:100||unique:publishers,name_en',
            'name_ar' => 'required|max:100||unique:publishers,name_ar'
        ];
    }
    public function messages()
    {
        return [
            'name_en.required' => __('messages.this fleid is required'),
            'name_en.unique' => __('messages.this fleid is unique'),
            'name_ar.required' => __('messages.this fleid is required'),
            'name_ar.unique' => __('messages.this fleid is unique')
        ];
    }
}
