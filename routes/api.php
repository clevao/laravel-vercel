<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => '/{client}'], function () {

	Route::get('/teste', function(){
		return 'Aplicacao  ' . env('APP_NAME') . ' respondendo';
	});

    Route::group(['prefix' => '/hello'], function () {
        Route::get('/{name}', ['uses'=>'\App\Http\Controllers\API\HelloController@hello']);
    });

});
