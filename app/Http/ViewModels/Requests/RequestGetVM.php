<?php


namespace App\Http\ViewModels\Requests;

use App\Domain\Requests\Model\Request;
use Illuminate\Contracts\Support\Arrayable;


class RequestGetVM implements Arrayable
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function toArray()
    {
        return  $this->request;
    }
}
