<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRegisterRequest extends FormRequest
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
            'name' => 'required|alpha|min:3|max:255',
            'email' => 'required|email|unique:users,email|min:3|max:255',
            'password' => 'required|min:3|max:255',
            'repassword' => 'required|min:3|max:255|same:password',
            'phone' => 'required|min:3|max:11',
        ];
    }
}
