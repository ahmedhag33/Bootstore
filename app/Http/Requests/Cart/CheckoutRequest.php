<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            // 'address' =>    'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'address' =>    'required',
            // 'mobile' => 'required|numeric|phone_number|size:11',
            'mobile' => 'required|numeric',
            'paymenttype' => 'required'
        ];
    }
}
