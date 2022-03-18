<?php


namespace App\Domain\Operations\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class OperationDTO extends DataTransferObject
{
    /* @var integer|null */
public $id;
	/* @var string|null */
public $name;
	/* @var integer|null */
public $is_used_in_system;
	

    public static function fromRequest($request)
    {
        return new self([
            'id' 					=> $request['id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,
			'is_used_in_system' 					=> $request['is_used_in_system'] ?? null ,
			
        ]);
    }
}
