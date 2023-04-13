<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use Illuminate\Support\Facades\Hash;

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
            echo "acceso concedido";
        } else {
            // echo "acceso denegado";
            return redirect()->route('login')->with('warning', "Usuario o Password incorrectos");
        }
        // return $passwordEncriptada;
    }
}
