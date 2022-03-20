<?php

namespace App\Exceptions;

use App\Helpers\Response;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class GeneralException extends Exception
{
    protected $detailed_error;

    public function __construct($message = "",$detailed_error = null, $code = 422, Throwable $previous = null)
    {
        $this->detailed_error = $detailed_error;
        parent::__construct($message, $code, $previous);
    }

    final public function getDetailedError(){
        return $this->detailed_error;
    }
    public function render(Request $request)
    {
        return response()->json(Response::error($this->message,$this->detailed_error,$this->code),$this->code);
    }
}
