<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view_registro(){
        
        return view('login.registro');
    }
    public function view_login(){
        
        return view('login.login');
    }

    public function login(Request $request){
         
        dd($request);

    }
    public function registro(Request $request){
        
    }
}
