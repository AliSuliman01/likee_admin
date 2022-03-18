<?php


namespace App\Domain\Operations\Actions;


use App\Domain\Operations\DTO\OperationDTO;
use App\Domain\Operations\Model\Operation;

class OperationUpdateAction
{

    public static function execute(
        Operation $operation,OperationDTO $operationDTO
    ){
        $operation->update(array_filter($operationDTO->toArray(),function($item){return $item !== null;}));
        return $operation;
    }
}
