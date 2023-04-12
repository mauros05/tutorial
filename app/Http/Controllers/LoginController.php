<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function login_access(Request $request){
        return $request;
    }
}
