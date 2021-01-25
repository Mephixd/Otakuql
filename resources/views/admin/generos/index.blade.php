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
                    <h2>Administracion de Generos</h2>
                </div>
                <div class="d-flex justify-content-end p-4">
                    <button  data-toggle="modal" data-target="#modalGenero" class="btn btn-success">Agregar Genero</button>
                </div>
                <div class="card-body">
                    <table id="table-generos" class="table table-hover table-striped">
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



<!-- Modal -->
<div class="modal fade" id="modalGenero" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Genero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="new-genero">
                    <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input type="text" class="form-control" placeholder="Nombre del genero" id="nombre" name="nombre">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btn-new-genero" class="btn btn-success">Crear Genero</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>


    $(document).ready(function(){
        
        var genero_table = $('#table-generos').DataTable({
           "ajax": "/admin/generos/table",
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
                    {data: 'nombre'},
                    {data: 'id'}
                    
            ],
            columnDefs: [
                {
                    targets: 2,
                    createdCell: function(td, cellData, rowData, row, col){
                        $button = "<div class='d-flex justify-content-around'>"
                        $button += "<a href='{!!URL::to('/admin/generos/edit/"+ cellData+ "')!!}' class='btn btn-sm col-lg-4  btn-outline-success' >"
                        $button += "Editar"    
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

      

        $('#btn-new-genero').click(()=>{
            var nombre = $('#nombre').val();
            
            $.ajax({
              type: 'POST',
              data: {
                  nombre: nombre,
                  "_token": "{{csrf_token()}}"
              },
              url: '/admin/generos/create',
              success: function(data){
                 console.log(data,nombre);
                 if(!data.mensaje && data.status != 500){
                    Swal.fire(
                    'Creado!',
                    'El genero fue creado exitosamente.', 
                    'success'
                    );
                    genero_table.ajax.reload();
                    $('#modalGenero').modal('hide');
                    $('#nombre').val('');

                 }else{
                    Swal.fire(
                    'Error!',
                    'El nombre es Obligatorio', 
                    'error'
                    );
                 }
              }



            });
        });
       
        

        $('#table-generos tbody').on('click','#btn-eliminar',function(){
            var id = $(this).attr("data-id");
           console.log(id); 

            Swal.fire({
            title: 'Estas seguro que quieres eliminar este Genero?',
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
                url: "/admin/generos/delete",
                success: function(data){
                    Swal.fire(
                    'Borrado!',
                    'El Genero fue borrado exitosamente.', 
                    'success'
                    );
                    genero_table.ajax.reload();
                }
            })

                
            }
            })
           
        });
   });
    



</script>
@endsection