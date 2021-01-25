<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genero;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AnimeController extends Controller
{
    
    public function index(){

        return view('admin.animes.index');
    }

    public function anime_table(){
        $animes = Anime::all();
        return Datatables()->of($animes)
    
        ->toJson();
    }

    public function create_anime(){
        $generos = Genero::all();
        
        return view('admin.animes.create',compact('generos'));
    }

    public function store_anime(Request $request){
       
      //dd($request->all());
      $mañana = Carbon::tomorrow();
      $mensajes = [
        'nombre.unique'=>'El titulo del anime ya se encuentra registrado',
        'estreno.before'=>'La fecha de estreno es incorrecta'
      ];
      $validacion = $request->validate([
         'nombre' => 'required|unique:anime|max:200',
         'estreno'=>'required|date',
         'trailer'=>'required|max: 500',
         'sinopsis'=>'required|max:2000',
         'estado'=>'required',
         'portada'=>'required|file|max:10000|mimes:jpg,bmp,png,jpeg,webp'
      ],$mensajes);
      
      
      $anime = new Anime();
      $anime->nombre = $request->nombre;
      $anime->estreno = $request->estreno;
      $anime->trailer_url= $request->trailer;
      $anime->sinopsis = $request->sinopsis;
      $anime->calificacion = 10;
      $anime->estado = $request->estado;
   
      //Guardar portada en proyecto
      $portada= $request->file('portada');
      $anime->portada = $request->file('portada')->getClientOriginalName();

      //Guardar portada 
      $nombre_portada = $request->file('portada')->getClientOriginalName();
      $ext_portada = $request->file('portada')->getClientOriginalExtension();
      $nombre_archivo = str_replace(' ','_', $request->nombre);
      $anime->portada = $nombre_archivo;
      $anime->save();
     
      $nombre_archivo =$anime->id.'.'.$ext_portada;
      $anime->extension_img  = $ext_portada;
      $anime->save();
    
      //store->(nombre_carpeta,disco);
      $fileDrive = $request->file('portada')->storeAs('1fJRkUmYoQtltfJYRDfOs8x_Gzcgri27S',$nombre_archivo,'google');
      Storage::disk('local')->put('public/portadas/'.$nombre_archivo,  File::get($portada));
      //$fileLocal = $request->file('portada')->storeAs('portadas',$nombre_archivo,'portadas');

     // dd($nombre_portada,$nombre_archivo,$filepath);
     
      //Storage::disk('google')->put($nombre_portada.'.'.$ext_portada,$request->file('portada'));
      //$path = $portada->storeAs('google',$anime->id.'.'.$portada->getClientOriginalExtension());
      $anime->generos()->sync($request->generos);
      return redirect()->route('admin.anime')->with('anime_success','Anime Agregado exitosamente!');

    }
    public function edit_anime($id){
        $anime = Anime::find($id);
        $generos = Genero::all();
        
        return view('admin.animes.edit',compact('anime','generos'));
    }
    public function update_anime(Request $request, $id){
       
        $mañana = Carbon::tomorrow();
        $mensajes = [
          'estreno.before'=>'La fecha de estreno es incorrecta'
        ];
        $validacion = $request->validate([
           'nombre' => 'required|max:200',
           'estreno'=>'required|date',
           'trailer'=>'required|max: 500',
           'sinopsis'=>'required|max:2000',
           'estado'=>'required',
           'portada'=>'file|max:1000000|mimes:jpg,bmp,png,jpeg,webp'
        ],$mensajes);
        $anime = Anime::find($id);
        //Borrar y volver a subir archivo 
        if($request->portada){
            
            $existe = Storage::disk('public')->exists('portadas/'.$anime->id.'.'.$anime->extension_img);
            if($existe){
                
                
                //Datos de archivo subido
                $portada= $request->file('portada');
                $nombre_portada = $portada->getClientOriginalName();
                $ext_portada =  $portada->getClientOriginalExtension();
               /*  $nombre_archivo = str_replace(' ','_', $request->nombre);
                $nombre_archivo =$nombre_archivo.'.'.$ext_portada; */
                $nombre_archivo = $anime->id.'.'.$ext_portada;
              
                //Eliminamos la portada actual en local y google drive
                Storage::disk('public')->delete('portadas/'.$anime->id.'.'.$anime->extension_img);
                $delete_google =  Storage::disk('google')->delete('portadas/'.$anime->id.'.'.$anime->extension_img);
                
                //Almacenamos nueva portada en disco local y google drive
                Storage::disk('local')->put('public/portadas/'.$nombre_archivo,  File::get($portada));
                $fileDrive = $request->file('portada')->storeAs('1fJRkUmYoQtltfJYRDfOs8x_Gzcgri27S',$nombre_archivo,'google');

                //Actualizamos bd 
                $anime->extension_img  = $ext_portada;
                $anime->portada = $nombre_archivo;                
            }

        }
        $anime->nombre = $request->nombre;
        $anime->estreno = $request->estreno;
        $anime->trailer_url= $request->trailer;
        $anime->sinopsis = $request->sinopsis;
        $anime->calificacion = 10;
        $anime->estado = $request->estado;
        $anime->save();
        $anime->generos()->sync($request->generos);

        return redirect()->route('admin.anime')->with('anime_success','Anime Actualizado exitosamente!');




    }

    public function delete_anime(Request $request){


        $anime =  Anime::find($request->id);
       
      
        Storage::disk('public')->delete('portadas/'.$anime->id.'.'.$anime->extension_img);
        Storage::disk('google')->delete('1fJRkUmYoQtltfJYRDfOs8x_Gzcgri27S/8.webp');
        $anime->delete();
        
        return response()->json(["mensaje"=>"Anime eliminado exitosamente!","status"=>200]);
    }
   
}
