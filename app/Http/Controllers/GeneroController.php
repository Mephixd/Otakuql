<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
use Datatables;
use Illuminate\Support\Facades\Validator;



class GeneroController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index(){

        return view('admin.generos.index');
    }

    public function genero_table(){
        $generos = Genero::all();
        return Datatables()->of($generos)->toJson();
    }

    public function create_genero(Request $request){
        
        
        if(strlen($request->nombre) == 0){
            return response()->json([
                "mensaje"=>"El campo nombre es obligatorio",
                "status"=>"500"
            ]);
        }
        
        $genero = new Genero();
        $genero->nombre = $request->nombre;
        $genero->save();
        return response()->json($genero);
    }
    public function edit_genero($id){
        $genero = Genero::find($id);

        return view('admin.generos.edit',compact('genero'));
    }
    public function update_genero(Request $request,$id){
        $genero = Genero::find($id);
        $genero->nombre = $request->nombre;
        $genero->save();

        return redirect()->route('admin.genero')->with('genero_success','Genero actualizado exitosamente');
    }
    public function delete_genero(Request $request){

        $genero = Genero::find($request->id);
        $genero->delete();
        return response()->json([
            "mensaje"=>"Eliminado exitosamente!",
            "status"=>200
        ]);
    }
    

}
