<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ];
    }
}
