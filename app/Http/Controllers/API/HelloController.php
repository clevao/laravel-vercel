<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class HelloController extends BaseController
{
 
    public function hello($client, $name){

        return $this->sendResponse("Hello $name from $client", '');

    }
    
}
