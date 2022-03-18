<?php


namespace App\Http\Requests\Accounts;


use App\Http\Requests\ApiFormRequest;

class AccountUpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'email' 					=> 'required_without:phone_number|unique:accounts,email,NULL,id,deleted_at,NULL' ,
            'phone_number' 				=> 'required_without:email|unique:accounts,phone_number,NULL,id,deleted_at,NULL' ,
            'password' 					=> 'required|string' ,
        ];
    }
}
