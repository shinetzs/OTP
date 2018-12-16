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
Route::post('recibirGas/{id}/{gas}', 'ArduinoController@datosArduino');
Route::post('login', 'MovilController@login');
Route::post('register', 'MovilController@register');
Route::post('listaValor', 'MovilController@enviarDatos');
Route::get('abrirValvula', 'MovilController@abrirValvula');
Route::get('cerrarValvula', 'MovilController@cerrarValvula');

Route::post('registroArduino', 'MovilController@registroArduino');

Route::match(['get','post'], '/test', function (Illuminate\Http\Request $request) {
    dd($request->headers->all());
});
Route::group(['middleware'=> ['auth:api']], function(){
    Route::post('details', 'MovilController@details'); 
    
});

Route::middleware('auth:api')->group(function(){
    
    Route::post('listaArduino', 'MovilController@listaArduinos'); 
    Route::post('registroArduino', 'MovilController@registroArduino');
});

