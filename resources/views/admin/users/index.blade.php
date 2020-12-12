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
                        $button += "<a href='{!!URL::to('/admin/user/" + cellData +"')!!}' class='btn btn-sm col-lg-4 mr-4  btn-outline-danger' >"
                        $button += "Eliminar"
                        $button += "</a>"
                        $button += "</div>"
                        $(td).html($button)
                    }
                }
            ]
        });

   });
    



</script>
@endsection