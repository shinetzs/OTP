<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\User;
use App\Arduino;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    // redirección de login cuando se esta logeado
    public function __constructor(){
        $this-> middleware('_guest_', ['only'=>'showLoginForm']);
    }

     //validación de usuario registrado
    public function login(Request $request){
        //validación de almacenamiento de datos en "request" con metodo post
        if($request->isMethod('post')){
            $data = $request->all();
            
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                
                return redirect('admin/dashboard');
            }else{
            
                return redirect('/admin')->with('flash_message_error','Email o contraseña invalida'); 
            }
        }
        return view('main/admin_login');
    }    
    public function dashboard(){
        
        return view('main/dashboard');
    }  

    //desconectar
    public function logout(){
        
        Session::flush();//limpiar Session
        return redirect('/admin')->with('flash_message_success','Desconectado Correctamente'); 
    }  


    }
            



    // prueba de cambio de password con ajax

   /*  Public function pass(){
        return view('admin.pass');
    }


    public function checkpass(Request $request){
        $input = request()->all();
        $pwd = $input['pwd'];
        $oldpwd = Auth::user()->password;
        if(Hash::check($pwd, $oldpwd)){

            echo "true";die;
        }else{
            echo "false";die;
        }
        
    }
    public function actualizar(Request $request){
        //validación de almacenamiento de datos en "request" con metodo post
        if($request->isMethod('post')){
            $data = $request->all();
            // echo"<pre>";print_r($data); die;   
            // $check = user::where(['email'=> Auth::user()->email])->first();
            // $pwd = $data['pwd'];
            //if(Hash::check($pwd, $check->password)){
            //  $password = bcrypt(data['nueva_pwd']);
            //   User::where ('id')->update(['password'=>$password]);
            //  return redirect('/pass')-with('flash_message_success','cambio realizado');
            // echo "true";die;
        }else{
            return redirect('/pass')-with('flash_message_error','Password incorrecta');
            //echo "false";die;
        }
        } */
    
