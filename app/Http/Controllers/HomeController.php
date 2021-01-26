<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        
        return view('Home.index');
    }

    public function obtenerAnimesIndex(){
        $data = Anime::all();
        return $data;
    }


    public function play_anime(){

        return view('Home.play');
    }
}
