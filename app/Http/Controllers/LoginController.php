<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function login_access(Request $request){
        // $errors = $this->validate($request,[
        //     'email' => 'required|email',
        //     'pass'  =>  'required'
        // ]);

        // return $errors;
        // // $passwordEncriptada = Hash::make($request->pass);

        $busqueda = usuarios::where('email', $request->email)
                            ->where('activo', 1)
                            ->get();
        
                            $validacion = count($busqueda);

        $resValidation = NULL;
        
        if($validacion == 1 && Hash::check($request->pass, $busqueda[0]->password)){
            // Crear una Sesion
            Session::put('sesionUsuario',$busqueda[0]->nombre . ' '. $busqueda[0]->ap_pat. ' '. $busqueda[0]->ap_mat);
            Session::put('sessionTipoUsuario',$busqueda[0]->tipo);
            Session::put('sessionIdUsuario',$busqueda[0]->id);

            $resValidation["flag"] = 1; 
            
            echo json_encode($resValidation);
            
        } else {
            
            $resValidation["msg_error"] = "Usuario o Contraseña incorrectos";
            $resValidation["flag"] = 0; 
            echo json_encode($resValidation);
        }
    }

    public function redirect(){
        return redirect()->route('principal')->with('successLogin', "Acceso permitido");
    }

    public function principal(){
        if(session('sessionIdUsuario')<>""){
            return view('vistabootstrap');
        } else {
            return redirect()->route('login')->with('warning', "Requiere iniciar Sesion");
        }
    }

    public function cerrar_sesion(){
        Session::forget('sesionUsuario');
        Session::forget('sessionTipoUsuario');
        Session::forget('sessionIdUsuario');
        Session::flush();

        return redirect()->route('login')->with('warning', "Sesion Cerrada Correctamente");
    }    
}
