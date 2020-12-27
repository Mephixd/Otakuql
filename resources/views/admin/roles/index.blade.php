@extends('layouts.admin')


@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            @if(Session::has('rol_updated'))
            <div class="alert alert-success" role="alert">
                <strong>{{Session::get('rol_updated')}}</strong>
            </div>
            @endif
            <div class="table-responsive-lg">
                <div class="text-center">
                    <h2>Administracion de Roles</h2>
                </div>
                <div class="col-lg-1 offset-11">
                    <a href="{{route('admin.roles.create')}}" class="btn btn-success">Crear Rol</a>
                </div>
                <div class="card-body">
                    <table id="table-roles" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>


    $(document).ready(function(){
        
        var roles_table = $('#table-roles').DataTable({
           "ajax": "/admin/roles/table",
           processing: true,
            "serverSide": true,
            "bAutoWidth": false,
            responsive: true,
            autoFill: true,
            "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                    "type": 'GET'
            },
            "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'id'}
                    
            ],
            columnDefs: [
                {
                    targets: 2,
                    createdCell: function(td, cellData, rowData, row, col){
                        $button = "<div class='d-flex justify-content-around'>"
                        $button += "<a href='{!!URL::to('/admin/roles/edit/"+ cellData+ "')!!}' class='btn btn-sm col-lg-4  btn-outline-success' >"
                        $button += "Ver"    
                        $button += "</a>"
                        $button += "<button id='btn-eliminar' data-id='"+cellData+"' class='btn btn-sm col-lg-4 mr-4  btn-outline-danger'>"
                        $button += "Eliminar"
                        $button += "</button>"
                        $button += "</div>"
                        $(td).html($button)
                    }
                }
            ] 
        });

        $('#table-roles tbody').on('click','#btn-eliminar',function(){
            var id = $(this).attr("data-id");
           console.log(id); 

            Swal.fire({
            title: 'Estas seguro que quieres eliminar este rol?',
            text: "Esta accion no se puede revertir!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borralo!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                type: "POST",
                 data: {
                    id: id,
                    "_token": "{{ csrf_token() }}",
                },
                url: "/admin/roles/delete",
                success: function(data){
                    Swal.fire(
                    'Borrado!',
                    'El Rol fue borrado exitosamente.', 
                    'success'
                    );
                    roles_table.ajax.reload();
                }
            })

                
            }
            })
           
        });

     
   });
    



</script>
@endsection