<?php


namespace App\Domain\Accounts\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class AccountDTO extends DataTransferObject
{
    /* @var integer|null */
public $id;
	/* @var string|null */
public $email;
	/* @var string|null */
public $phone_number;
	/* @var string|null */
public $password;
	

    public static function fromRequest($request)
    {
        return new self([
            'id' 					=> $request['id'] ?? null ,
			'email' 					=> $request['email'] ?? null ,
			'phone_number' 					=> $request['phone_number'] ?? null ,
			'password' 					=> $request['password'] ?? null ,
			
        ]);
    }
}
