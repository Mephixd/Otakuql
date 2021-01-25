<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::create(['nombre'=>'Acción']);
        Genero::create(['nombre'=>'Aventuras']);
        Genero::create(['nombre'=>'Carreras']);
        Genero::create(['nombre'=>'Ciencia Ficcion']);
        Genero::create(['nombre'=>'Comedia']);
        Genero::create(['nombre'=>'Demonios']);
        Genero::create(['nombre'=>'Deportes']);
        Genero::create(['nombre'=>'Drama']);
        Genero::create(['nombre'=>'Ecchi']);
        Genero::create(['nombre'=>'Escolares']);
        Genero::create(['nombre'=>'Espacial']);
        Genero::create(['nombre'=>'Fantasía']);
        Genero::create(['nombre'=>'Harem']);
        Genero::create(['nombre'=>'Infantil']);
        Genero::create(['nombre'=>'Magia']);
        Genero::create(['nombre'=>'Mecha']);
        Genero::create(['nombre'=>'Militar']);
        Genero::create(['nombre'=>'Misterio']);
        Genero::create(['nombre'=>'Música']);
        Genero::create(['nombre'=>'Parodia']);
        Genero::create(['nombre'=>'Romance']);
        Genero::create(['nombre'=>'Seinen']);
        Genero::create(['nombre'=>'Shoujo']);
        Genero::create(['nombre'=>'Shounen']);
        Genero::create(['nombre'=>'Sobrenatural']);
        Genero::create(['nombre'=>'Suspenso']);
        Genero::create(['nombre'=>'Terror']);

    }
}
