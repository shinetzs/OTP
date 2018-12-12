<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arduino;
class ArduinoController extends Controller
{
    //recepción de datos arduino con ingreso a bd   --  cambiar de controllador por orden
    //public function datosArduino(Request $request){
        public function datosArduino($id, $gas){
        //almacenar datos en variables
       /*  $idArduino = $request->input('id');
        $gas = $request->input('gas'); */
        

        // relacionar arduino con usuario e insertar nivel de gas
      /*   $valorIngreso = Arduino::findOrFail($idArduino); 
        $valorIngreso -> users()->attach($valorIngreso->users->first()->id, ['gas'=> $gas]); */
        $valorIngreso = Arduino::findOrFail($id); 
        $valorIngreso -> users()->attach($valorIngreso->users->first()->id, ['gas'=> $gas]);

    return 'llego';
    }
}
