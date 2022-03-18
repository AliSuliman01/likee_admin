<?php


namespace App\Http\ViewModels\Requests;

use App\Domain\Requests\Model\Request;
use Illuminate\Contracts\Support\Arrayable;

class RequestGetAllVM implements Arrayable
{

    public function get_requests(){
    	return Request::all();
	}
    public function toArray()
    {
        return $this->get_requests();
    }
}
