<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Datatables;

class AdminController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){

        return view('admin.index');
    }
    public function view_users(){
        
        $users = User::all(); 
        
        return view('admin.users.index',compact('users'));
    }
    public function users_table(){

        $users = User::all(); 
        return Datatables()->of($users)->toJson();
    }

    public function edit_user(Request $request, $id){
        $user = User::find($id);

        return view('admin.users.edit',compact('user'));
    }

    public function delete_user(Request $request,$id){

        return $id;
    }
}
