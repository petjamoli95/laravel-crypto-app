<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }
}
