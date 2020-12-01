<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function view_registro(){
        
        return view('login.registro');
    }
    public function view_login(){
        
        return view('login.login');
    }
}
