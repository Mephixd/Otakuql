<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Datatables;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
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
        $roles = Role::all();
        
        return view('admin.users.edit', compact('user','roles'));
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
        $user->syncRoles($request->roles);
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

    public function view_roles(){
        return view('admin.roles.index');
    }

    public function roles_table(){

        $roles = Role::all();
        
        return Datatables()->of($roles)->toJson();
    }

    public function role_edit($id){
        
        $rol = Role::find($id);
        $permisos = Permission::all();
        
       // dd($rol->getAllPermissions());

        return view('admin.roles.edit',compact('rol','permisos'));
    }

    public function role_update(Request $request, $id){

        $role = Role::find($id);
        $role->name = $request->nombre;
        
        //agregar o quitar permisos al rol
        $role->syncPermissions($request->permisos);

        $role->save();

        return redirect()->route('admin.roles')->with('rol_updated','Rol actualizado exitosamente!');

    }
    public function create_rol(){
        $permisos = Permission::all();
        return view('admin.roles.create',compact('permisos'));
    }

    public function store_rol(Request $request){
        
        $roleAdmin = Role::create(['name' => $request->nombre,'guard_name'=>'web']);
        $roleAdmin->givePermissionTo($request->permisos);
       // dd($rol->getAllPermissions());
       return redirect()->route('admin.roles')->with('rol_updated','Rol Creado exitosamente!');
    }

    public function delete_rol(Request $request)
    {

        $user = Role::find($request->id);
        $user->delete();

        return response()->json([
            "mensaje" => "Rol eliminado exitosamente!",
            "status" => 200
        ]);
    }



    


}
