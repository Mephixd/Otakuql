<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class CatalogoController extends Controller
{
    public function catalogo(){
        
        $animes = Anime::all();

        return view('Home.catalogo.catalogo',compact('animes'));
    }

    public function review_Anime($anime){
        $anime = Anime::find($anime);
        return view('home.catalogo.review',compact('anime'));
    }

}
