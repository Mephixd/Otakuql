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
                    <h2>Administracion de Animes</h2>
                </div>
                <div class="d-flex justify-content-end p-4">
                    <a href="{{route('admin.anime.create')}}" class="btn btn-success">Agregar Anime</a>
                </div>
                <div class="card-body">
                    <table id="table-animes" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Portada</th>
                                <th>Nombre</th>
                                <th>Estreno</th>
                                <th>Estado</th>
                                <th>Calificación</th>
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
        
        var anime_table = $('#table-animes').DataTable({
           "ajax": "/admin/animes/table",
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
                    {data: 'portada'},
                    {data: 'nombre'},
                    {data: 'estreno'},
                    {data: 'estado'},
                    {data: 'calificacion'},
                    {data: 'id'},
                    {data: 'extension_img'},
            ],
            columnDefs: [
                
                 {
                    targets: 1,
                    createdCell: function(td, cellData, rowData, row, col){
                        console.log(row,td,cellData,rowData,col);
                       // console.log(rowData.portada);
                        var extension  =rowData.extension_img;
                        var portada = rowData.id+'.'+extension;
                        //obtener extension
                     
                        console.log(portada);
                        
                        $portada = `<img src='{{asset('storage/portadas/${portada}')}}' style='height:70px; width: 100px;' />`;
                        $(td).html($portada);
                    }
                }, 
                {
                    targets: 6,
                    createdCell: function(td, cellData, rowData, row, col){
                        $button = "<div class='d-flex justify-content-around'>"
                        $button += "<a href='{!!URL::to('/admin/animes/edit/"+ cellData+ "')!!}' class='btn btn-sm col-lg-4 mt-3  btn-outline-success' >"
                        $button += "Editar"    
                        $button += "</a>"
                        $button += "<button id='btn-eliminar' data-id='"+cellData+"' class='btn btn-sm col-lg-4 mr-4 mt-3  btn-outline-danger'>"
                        $button += "Eliminar"
                        $button += "</button>"
                        $button += "</div>"
                        $(td).html($button)
                    }
                },
                {
                    targets: 7 ,
                    "visible": false,
                }
            ] 
        });

      

     
       
        

        $('#table-animes tbody').on('click','#btn-eliminar',function(){
            var id = $(this).attr("data-id");
           console.log(id); 

            Swal.fire({
            title: 'Estas seguro que quieres eliminar este Anime?',
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
                url: "/admin/animes/delete",
                success: function(data){
                    Swal.fire(
                    'Borrado!',
                    'El Anime fue borrado exitosamente.', 
                    'success'
                    );
                    anime_table.ajax.reload();
                }
            })

                
            }
            })
           
        });
   });
    



</script>
@endsection