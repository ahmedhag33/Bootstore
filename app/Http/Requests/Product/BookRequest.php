<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|max:100||unique:books,name',
            'rate' => 'numeric|max:5',
            'price' => 'numeric',
            'discount' => 'numeric',
            'new_price' => 'numeric',
            'photo' => 'mimes:jpg,bmp,png',
            'file' => 'mimes:pdf'
        ];
    }
}
