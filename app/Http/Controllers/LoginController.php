<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{   
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function view_registro(){
        
        return view('login.registro');
    }
    public function view_login(){
        
        return view('login.login');
    }

    public function login(Request $request){
         
        $validacion = $request->validate([
            'email' => 'required',
            'contraseña'=>'required'
         ]);

         //$credenciales = $request->only('email','contraseña');
         if (Auth::attempt(['email'=>$request->email,'password'=>$request->contraseña])) {
            $request->session()->regenerate();
                
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no corresponden a ningun usuario registrado.',
        ]);

    }
    public function registro(Request $request){
        
        $validacion = $request->validate([
           'email' => 'required|unique:users|max:60|email',
           'nombre'=> 'required|max:60|string',
           'contraseña'=>'required|max:16|min:8|alpha_num'
        ]);

        $user = new User;
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->contraseña);
        $user->save();

        return redirect()->route('login.view')->with('new_user','Usuario creado exitosamente!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
