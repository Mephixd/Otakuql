@extends('layouts.admin')



@section('main')

<div class="row">
    <div class="col-lg-8 col-sm-12 offset-lg-2">
        <div class="card">
            <div class="card-header text-center h3">
                Editar Usuario
            </div>
            <div class="card-body">
                @if(Session::has('user_updated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{Session::get('user_updated')}}</strong>
                </div>
                @endif
                <form action="{{route('admin.users.update',$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del usuario" value="{{$user->name}}">
                            </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nombre">Email: </label>
                                <input type="text" class="form-control" name="email" placeholder="Ingrese el email del usuario" value="{{$user->email}}">
                            </div>
                         </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-6">
                        <div class="form-group">
                            <label for="roles">Cargos</label>
                            <ul class="list-unstyled">   
                                    <li>
                                        <label>
                                            <input type="checkbox" name="admin" @if($user->hasRole('Administrativo')) checked @endif >
                                            Administrador
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="mod" @if($user->hasRole('mod')) checked @endif >
                                             Moderador
                                        </label>
                                    </li>
                            </ul>
                        </div>
                       </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-success col-2" type="submit">Guardar</button>
                        <a href="{{route('admin.users')}}" class="btn btn-danger col-2 ml-2">Volver</a>
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