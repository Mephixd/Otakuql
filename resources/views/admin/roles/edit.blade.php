@extends('layouts.admin')



@section('main')

<div class="row">
    <div class="col-lg-8 col-sm-12 offset-lg-2">
        <div class="card">
            <div class="card-header text-center h3">
                Editar Rol {{$rol->name}}
            </div>
            <div class="card-body">
                @if(Session::has('rol_updated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{Session::get('rol_updated')}}</strong>
                </div>
                @endif
                <form action="{{route('admin.roles.update',$rol->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del rol" value="{{$rol->name}}">
                            </div>
                         </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-6">
                        <div class="form-group">
                            <label for="roles">Permisos</label>
                            <ul class="list-unstyled">
                                @foreach($permisos as $permiso)   
                                    <li>
                                        <label>
                                            <input type="checkbox" name="permisos[]" id="{{$permiso->id}}" value="{{$permiso->name}}"  @if($rol->hasPermissionTo($permiso->name)) checked  @endif  >
                                            {{$permiso->name}}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                       </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-success col-2" type="submit">Guardar</button>
                        <a href="{{route('admin.roles')}}" class="btn btn-danger col-2 ml-2">Volver</a>
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