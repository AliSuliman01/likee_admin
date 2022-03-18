<?php


namespace App\Domain\Requests\Actions;


use App\Domain\Requests\DTO\RequestDTO;
use App\Domain\Requests\Model\Request;

class RequestUpdateAction
{

    public static function execute(
        Request $request,RequestDTO $requestDTO
    ){
        $request->update(array_filter($requestDTO->toArray(),function($item){return $item !== null;}));
        return $request;
    }
}
