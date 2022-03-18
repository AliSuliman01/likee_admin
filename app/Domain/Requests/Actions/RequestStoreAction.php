<?php


namespace App\Domain\Requests\Actions;


use App\Domain\Requests\DTO\RequestDTO;
use App\Domain\Requests\Model\Request;

class RequestStoreAction
{
    public static function execute(
        RequestDTO $requestDTO
    ){

        return Request::create(array_filter($requestDTO->toArray(),function($item){return $item !== null;}));
    }
}
