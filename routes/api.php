<?php

use Illuminate\Http\Request;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

// Excepción de clientes para APIs
Route::post('recibirGas', 'ArduinoController@datosArduino');
Route::post('login', 'MovilController@login');
Route::post('register', 'MovilController@register');
Route::post('enviarGas', 'MovilController@enviarDatos');

Route::middleware('auth:api')->post('registroArduino', 'MovilController@registroArduino');
Route::middleware('auth:api')->post('details', 'MovilController@details'); 
Route::middleware('auth:api')->post('listaArduino', 'MovilController@listaArduinos'); 