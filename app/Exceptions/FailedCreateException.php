<?php

namespace App\Exceptions;
use App\Helpers\ApiExceptionHandler;
use Exception;


class FailedCreateException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('FailedCreate','Failed To Create', 400);
    }
}
