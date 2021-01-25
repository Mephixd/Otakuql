@extends('layouts.admin')


@section('main')



<div class="row">
    <div class="col-lg-12">
        <div class="card">
             <div class="card-header text-center">
                 <h2>Editar Anime: "{{$anime->nombre}}"</h2>
                 
             </div>
            <div class="card-body">
                <form action="{{route('admin.anime.update',$anime->id)}}" method="POST" enctype="multipart/form-data" id="form-anime">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-5">
                       <div class="card prev-portada">
                           <img src="{{asset('storage/portadas/'.$anime->id.'.'.$anime->extension_img)}}" alt="sin-imagen"  style="height: 25rem">
                       </div>
                    </div>
                    <div class="col-7">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" value="{{$anime->nombre}}" class="form-control @error('nombre') is-invalid  @enderror" placeholder="Nombre del anime" id="nombre" name="nombre">
                                @error('nombre')
                                <div  class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="estreno">Fecha de estreno</label>
                                <input type="date"  value="{{$anime->estreno}}"  name="estreno" id="estreno" class="form-control @error('estreno') is-invalid  @enderror">
                                @error('estreno')
                                <div  class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="portada">Actualizar portada</label>
                                <input type="file"   class="form-control @error('portada') is-invalid  @enderror" accept="image/*" id="portada" name="portada">
                                @error('portada')
                                <div  class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="generos">Generos</label>
                            <select name="generos[]"   id="generos" class="form-control @error('generos') is-invalid  @enderror" multiple="multiple" >
                                @foreach($generos as $genero)
                                <option value="{{$genero->id}}" 
                                @foreach($anime->generos as $anime_genero) 
                                    @if($anime_genero->id == $genero->id) 
                                    selected
                                    @endif
                                @endforeach >{{$genero->nombre}}</option>
                                 @endforeach
                                {{--   @foreach($anime->generos())
                                  <option value="{{$genero->id}}" @if($anime->generos()->id == $genero->id) selected @endif>{{$genero->nombre}}</option>
                                  @endforeach --}}
                                
                            </select>
                            @error('generos')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <label for="trailer">Trailer</label>
                            <input type="text"  value="{{$anime->trailer_url}}"  name="trailer" id="trailer" class="form-control @error('trailer') is-invalid  @enderror" placeholder="Ej: https://www.youtube.com/watch?v=FRn6xXXF-7s">
                            @error('trailer')
                            <div  class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado"  class="form-control @error('estado') is-invalid  @enderror">
                                <option value="1" @if($anime->estado == 1) selected @endif>En Emision</option>
                                <option value="2"  @if($anime->estado == 2) selected @endif>Finalizado</option>
                                <option value="3"  @if($anime->estado == 3) selected @endif>Proximamente</option>
                            </select>
                            @error('estado')
                            <div  class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="sinopsis">Sinopsis</label>
                        <div class="form-group">
                            <textarea name="sinopsis" id="sinopsis"  class="@error('sinopsis') is-invalid  @enderror">
                                {{$anime->sinopsis}}
                             </textarea>
                            @error('sinopsis')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div> 
                <div class="form-group text-center">
                   <button type="submit" class="btn btn-success btn-lg">Crear</button>    
                </div>                 
                </form>
            </div>
        </div>
    </div>
</div>





@endsection

@section('js')

<script>

     $("#portada").on('change',function () {
        filePreview(this);
    });

     tinymce.init({
      selector: 'textarea#sinopsis',
    });

    $('#generos').select2({
        theme:'classic',
        placeholder: 'Seleccione al menos un genero',
        minimumSelectionLength: 2
    });



    function filePreview(input) {
    if (input.files && input.files[0]) {
        console.log(input.files);
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.prev-portada img').remove();
            $('.prev-portada').append('<img src="'+e.target.result+'" style="height: 25rem"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
   
}
    
</script>
<script src="{{asset('es.js')}}"></script>


@endsection