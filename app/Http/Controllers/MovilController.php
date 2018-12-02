<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Arduino;  
use Illuminate\Support\Facades\Auth; 
use Validator;

class MovilController extends Controller
{


    public function register(Request $request){
         
        $validator = Validator::make($request->all(), [ //creamos la validación
             'name' => 'required', 
             'email' => 'required|email', 
             'password' => 'required', 
             'c_password' => 'required|same:password', 
        ]);

        if ($validator->fails()) {//validamos
            return response()->json(['error'=>$validator->errors()], 401);
        }
    
    //creamos el usuario
    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);

    //creamos el token y se lo enviamos al usuario
    $success['token'] =  $user->createToken(env('APP_NAME'))->accessToken;
    return response()->json(['success'=>$success], 200);
}


    public function login(Request $request)
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {//validar que el usuario existe en la bd 
            $user = Auth::user();//obtenemos el usuario logueado
            $success['token'] =  $user->createToken('MyApp')->accessToken; //creamos el token
            return response()->json(['success' => $success], 200);//se lo enviamos al usuario
        } else {
            return response()->json(['error'=>'Unauthorised'], 401); 
        }
    }
    

    /* public function details() { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], 200); 
    }
 */
    public function registroArduino(Request $request) {
        
        // validar campos vacios, existencia en bd.
        $validator = \Validator::make($request -> all(), [
            'idUsuario'=>   'required',
            'idArduino' =>  'required',
            'Direccion' =>  'required',
        ]);

        //retornar fallos de validación $validar
        if ($validator -> fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        //almacenar datos en variables
        $user = $request['idUsuario'];
        $idArduino = $request['idArduino'];
        $existencia = Arduino::find($idArduino);

        //verificar existencia y disponibilidad de sistema electronico
        if (empty($existencia)) { //falta validar estado de uso

            return "arduino no existe";
          
        }else{
         //validar que no exista union y si existe validar q sea el mismo dueño 
         
         
        //unir usuario arduino
        $unionArduinoUsuario = Arduino::findOrFail($idArduino); 
        $unionArduinoUsuario -> users()->attach($user);

            return [
                'id' => $unionArduinoUsuario->id,
            ];

        }
    }


    public function enviarDatos(Request $request){
            
        $validator = \Validator::make($request -> all(), [
                'idArduino' =>  'required',
        ]);
            
        $idArduino = $request['idArduino'];
        $arduino = Arduino::find($idArduino);

        return [
            'gas' => $arduino->users->last()->pivot->gas
            ];
        }


    public function listaArduinos(){
        $validator = \Validator::make($request -> all(), [
            'idUsuario' =>  'required',
        ]);    

        return App\User::find($request['idUsuario'])->Arduinos()->wherePivot('gas', null)->get();

    }
   
    }













   /*  public function registroUsuario(Request $request){

       
        // validar campos vacios, existencia en bd.
        $validar = \Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        //retornar fallos de validación $validar
    if ($validar->fails())
    {
        return $validar->errors();

        //retornar a pagina con error
        //return redirect()->back()->withInput()->withErrors($validar->errors());
    }
    //insertar usuario
    User::create([
        'name' =>       $request['name'],
        'email' =>      $request['email'],
        'password' =>   bcrypt($request['password']),
    ]); 
        return "registrado";
    
} */

