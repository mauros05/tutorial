<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function login_access(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'pass'  =>  'required'
        ]);

        // $passwordEncriptada = Hash::make($request->pass);

        $busqueda = usuarios::where('email', $request->email)
                            ->where('activo', 1)
                            ->get();
        
                            $validacion = count($busqueda);

        if($validacion == 1 && Hash::check($request->pass, $busqueda[0]->password)){
            // Crear una Sesion
            Session::put('sesionUsuario',$busqueda[0]->nombre . ' '. $busqueda[0]->ap_pat. ' '. $busqueda[0]->ap_mat);
            Session::put('sessionTipoUsuario',$busqueda[0]->tipo);
            Session::put('sessionIdUsuario',$busqueda[0]->id);

            return redirect()->route('principal')->with('successLogin', "Acceso permitido");
        } else {
            return redirect()->route('login')->with('warning', "Usuario o Contraseña incorrectos");
        }
    }

    public function principal(){
        if(session('sessionIdUsuario')<>""){
            return view('vistabootstrap');
        } else {
            return redirect()->route('login')->with('warning', "Requiere iniciar Sesion");
        }
    }
}
