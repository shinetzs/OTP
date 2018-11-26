<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArduinoController extends Controller
{
    //recepción de datos arduino con ingreso a bd   --  cambiar de controllador por orden
    public function datosArduino(Request $request){

        //almacenar datos en variables
        $idArduino = $request->input('id');
        $gas = $request->input('gas');
        

        // relacionar arduino con usuario e insertar nivel de gas
        $valorIngreso = Arduino::findOrFail($idArduino); 
        $valorIngreso -> users()->attach($valorIngreso->users->first()->id, ['gas'=> $gas]);

       
    }
}
