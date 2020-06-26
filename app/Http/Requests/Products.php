<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Products extends FormRequest
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
            'code_product' =>'required',
            'name' =>'required',
            'price' =>'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fullname.code_product'  => 'Code Products Wajib di Isi',
            'name.required'  => 'Name Wajib di Isi',
            'price.required'  => 'Price Wajib di Isi',
        ];
    }
}
