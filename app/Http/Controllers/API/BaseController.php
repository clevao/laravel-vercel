<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Model\ApiLog;

class BaseController extends Controller
{
    public function sendResponse($result, $message, $httpCode=200)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        //$this->registrarLog($response);
        return response()->json($response, $httpCode);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        //$this->registrarLog($response);

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }



    public function sendException(\App\Exceptions\ApiException $exception)
    {
        $response = [
            'success' => false,
            'message' => $exception->getMessage(),
        ];

        //$this->registrarLog($response);

        return response()->json($response, $exception->getHttpCode());
    }

    public function registrarLog($response) {

        $aas = \Request::get('contextoAcessoService');
        $tmp = (microtime(true) - $aas->microTimeInicio);// * 1000;
        $log = new ApiLog();

        if($aas->idUsuario)
            $log->user_id = $aas->idUsuario;
        $log->url = $_SERVER['REQUEST_URI'];
        $log->post = json_encode(app('request')->all());
        $log->token = app('request')->header('x-auth-token');
        $log->response = json_encode($response);
        $log->header = json_encode(app('request')->headers->all());
        $log->tempo = $tmp;
        $log->save();

    }
}
