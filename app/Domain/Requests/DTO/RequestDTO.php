<?php


namespace App\Domain\Requests\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class RequestDTO extends DataTransferObject
{
    /* @var integer|null */
public $id;
	/* @var string|null */
public $name;
	/* @var integer|null */
public $operation_id;
	/* @var integer|null */
public $is_succeed;
	/* @var integer|null */
public $is_failed;
	/* @var string|null */
public $post_url;
	/* @var integer|null */
public $user_type;
	/* @var integer|null */
public $requested_amount;
	/* @var string|null */
public $requested_comment;
	/* @var integer|null */
public $number_of_page_posts;


    public static function fromRequest($request)
    {
        return new self([
            'id' 					=> $request['id'] ?? null ,
			'name' 					=> $request['name'] ?? null ,
			'operation_id' 					=> $request['operation_id'] ?? null ,
			'is_succeed' 					=> $request['is_succeed'] ?? null ,
			'is_failed' 					=> $request['is_failed'] ?? null ,
			'post_url' 					=> $request['post_url'] ?? null ,
			'user_type' 					=> $request['user_type'] ?? null ,
			'requested_amount' 					=> $request['requested_amount'] ?? null ,
			'requested_comment' 					=> $request['requested_comment'] ?? null ,
			'number_of_page_posts' 					=> $request['number_of_page_posts'] ?? null ,

        ]);
    }
}
