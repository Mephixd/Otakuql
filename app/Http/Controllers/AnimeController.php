<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index(){

        
        return view('Home.index');
    }

    public function categorias(){
        
        return view('Home.categorias');
    }

    public function play_anime(){

        return view('Home.play');
    }
   
}
