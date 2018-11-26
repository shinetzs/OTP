<?php


// dirección raíz
Route::get('/', function () {return view('index.php');});

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::match(['get','post'],'admin', 'MainController@login');


//proteccion de rutas metodo laravel
//otra aprte en redirectauthenticated.php
Route::group(['middleware'=> ['auth']], function(){
    Route::get('admin/dashboard', 'MainController@dashboard');
    Route::get('logout', 'MainController@logout');
    
});




//rutas de prueba para cambio de password
/* Route::get('/pass', 'MainController@pass');
Route::post('/admin/checkpwd', 'MainController@checkpass');
Route::match(['get','post'],'/actualizarpass', 'MainController@actualizar'); */


