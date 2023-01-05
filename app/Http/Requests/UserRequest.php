<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|max:12|min:5'
        ];
       
    }
    public function messages()
    {
        return [
            "name.required" => " name 為必填",
            "email.required" => " email 為必填",
            "password.required" => " password 為必填"
        ];
    }
}
