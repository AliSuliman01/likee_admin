<?php


namespace App\Domain\Requests\Actions;


use App\Domain\Requests\DTO\RequestDTO;
use App\Domain\Requests\Model\Request;

class RequestDestroyAction
{
    public static function execute(
        Request $request
    ){

        $request->delete();
        return $request;
    }
}
