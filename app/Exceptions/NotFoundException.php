<?php

namespace App\Exceptions;
use App\Helpers\ApiExceptionHandler;
use Exception;

class NotFoundException extends Exception
{
    use ApiExceptionHandler;
    public function render(){
    	return $this->renderException('ContentNotFoundException','The Content you have requested is not found', 404);
    }
}
