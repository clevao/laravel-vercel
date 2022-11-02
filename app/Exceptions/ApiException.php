<?php

namespace App\Exceptions;

use Exception;
use App\Http\Controllers\API\BaseController;

class ApiException extends Exception
{
	private $httpCode;
    public function __construct($message, $httpCode)
	{
		$this->message = $message;
		$this->httpCode = $httpCode;
	}

	public function getHttpCode(){
		return $this->httpCode;
	}

	

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request)
    {        
		$base = new BaseController();
		return $base->sendException($this);
    }
}