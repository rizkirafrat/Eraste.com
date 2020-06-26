<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Orders extends FormRequest
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
            'fullname' =>'required',
            'phone' =>'required|min:11',
            'address' =>'required',
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
            'fullname.required' => 'Nama Wajib di Isi',
            'phone.required'  => 'Phone Wajib di Isi',
            'address.required'  => 'address Wajib di Isi',
        ];
    }
}
