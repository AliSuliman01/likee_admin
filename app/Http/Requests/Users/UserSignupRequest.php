<?php


namespace App\Http\Requests\Users;


use App\Http\Requests\ApiFormRequest;

class UserSignupRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ];
    }
}
