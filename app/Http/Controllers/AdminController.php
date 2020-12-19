<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Datatables;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        return view('admin.index');
    }
    public function view_users()
    {

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }
    public function users_table()
    {
        
        $users = User::all();
        
        return Datatables()->of($users)->toJson();
    }

    public function edit_user(Request $request, $id)
    {
        $user = User::find($id);
        
        return view('admin.users.edit', compact('user'));
    }

    public function update_user(Request $request, $id){
       // dd($request->all(),$id);
        $user = User::find($id);

        //Validaciones..
        $mensajes = [
            'nombre.required' => 'El nombre del usuario es Obligatorio',
            'email.required' => 'EL email del usuario es Obligatorio'
        ];
        Validator::make($request->all(),[
           'nombre' => 'required',
           'email' => 'email|required|max:30'
        ],$mensajes)->validate();

        //actualizar
        $user->name = $request->nombre;
        $user->email = $request->email;

        //Otorgar o quitar permisos 
        if($request->admin == "on"){
            $user->assignRole("Administrativo");
        }else{
            $user->removeRole("Administrativo");
        }
        if($request->mod == "on"){
            $user->assignRole("mod");
        }else{
            $user->removeRole("mod");
        }
        $user->save();

        return redirect()->back()->with("user_updated","Usuario actualizado exitosamente!");
        
    }

    public function delete_user(Request $request)
    {

        $user = User::find($request->id);
        $user->delete();

        return response()->json([
            "mensaje" => "Usuario eliminado exitosamente!",
            "status" => 200
        ]);
    }
}
