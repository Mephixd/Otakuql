@extends('layouts.admin')



@section('main')

<div class="row">
    <div class="col-lg-8 col-sm-12 offset-lg-2">
        <div class="card">
            <div class="card-header text-center h3">
                Editar Genero {{$genero->name}}
            </div>
            <div class="card-body">
                @if(Session::has('rol_updated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{Session::get('rol_updated')}}</strong>
                </div>
                @endif
                <form action="{{route('admin.genero.update',$genero->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del genero" value="{{$genero->nombre}}">
                            </div>
                         </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-success col-2" type="submit">Actualizar</button>
                        <a href="{{route('admin.genero')}}" class="btn btn-danger col-2 ml-2">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
 

</script>
@endsection