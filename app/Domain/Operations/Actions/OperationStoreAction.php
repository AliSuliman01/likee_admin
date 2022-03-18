<?php


namespace App\Domain\Operations\Actions;


use App\Domain\Operations\DTO\OperationDTO;
use App\Domain\Operations\Model\Operation;

class OperationStoreAction
{
    public static function execute(
        OperationDTO $operationDTO
    ){

        return Operation::create(array_filter($operationDTO->toArray(),function($item){return $item !== null;}));
    }
}
