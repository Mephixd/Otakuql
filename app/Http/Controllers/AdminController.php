<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){

        return view('admin.index');
    }
    public function view_users(){

        return view('admin.users.index');
    }
}
