<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;

class Anime extends Model
{
    use HasFactory;
    protected $table = "anime";

    public function generos(){
        return $this->belongsToMany(Genero::class,'anime_genero','id_anime','id_genero');
    }
}
