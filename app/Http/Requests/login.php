<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class login extends FormRequest
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
            
                
                'email' => 'required|email',
                'password' => 'required|string|max:12|min:5'
        ];
       
    }
    public function messages()
    {
        return [
            
            "email.required" => " email 為必填",
            "password.required" => " password 為必填"
        ];
    }
}
