<?php


namespace App\Http\ViewModels\Operations;

use App\Domain\Operations\Model\Operation;
use Illuminate\Contracts\Support\Arrayable;


class OperationGetVM implements Arrayable
{

    private $operation;

    public function __construct($operation)
    {
        $this->operation = $operation;
    }

    public function toArray()
    {
        return  $this->operation;
    }
}
