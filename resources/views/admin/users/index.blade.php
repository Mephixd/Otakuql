@extends('layouts.admin')


@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive-lg">
                <div class="text-center">
                    <h2>Administracion de usuarios</h2>
                </div>
                <div class="card-body">
                    <table id="table-users" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
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

        var table_users = $('#table-users').DataTable({
            "ajax": "/admin/users/table",
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
                    {data: 'email'},
                    {data: 'id'}
            ],
            columnDefs: [
                {
                    targets: 3,
                    createdCell: function(td, cellData, rowData, row, col){
                        $button = "<div class='d-flex justify-content-around'>"
                        $button += "<a href='{!!URL::to('/admin/user/" + cellData +"')!!}' class='btn btn-sm col-lg-4  btn-outline-success' >"
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

        $('#table-users tbody').on('click','#btn-eliminar',function(){
            var id = $(this).attr("data-id");
           console.log(id); 

            Swal.fire({
            title: 'Estas seguro que quieres eliminar este usuario?',
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
                url: "/admin/user",
                success: function(data){
                    Swal.fire(
                    'Borrado!',
                    'El usuario fue borrado exitosamente.', 
                    'success'
                    );
                    table_users.ajax.reload();
                }
            })

                
            }
            })
           
        });
   });
    



</script>
@endsection