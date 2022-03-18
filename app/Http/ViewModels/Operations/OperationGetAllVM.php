<?php


namespace App\Http\ViewModels\Operations;

use App\Domain\Operations\Model\Operation;
use Illuminate\Contracts\Support\Arrayable;

class OperationGetAllVM implements Arrayable
{

    public function get_operations(){
    	return Operation::all();
	}
    public function toArray()
    {
        return $this->get_operations();
    }
}
