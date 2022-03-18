<?php


namespace App\Domain\Operations\Actions;


use App\Domain\Operations\DTO\OperationDTO;
use App\Domain\Operations\Model\Operation;

class OperationDestroyAction
{
    public static function execute(
        Operation $operation
    ){

        $operation->delete();
        return $operation;
    }
}
