<?php


namespace App\Http\Requests\Users;


use App\Http\Requests\ApiFormRequest;

class UserLoginRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ];
    }
}
