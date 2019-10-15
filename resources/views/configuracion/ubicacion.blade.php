@extends('layouts/app')
@section('title','Ubicación')
@section('content')
<div class="container">
  <h1>Ubicación</h1>
  <form action="{{route('create_ubicacion')}}" method="post">
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Nombre Ubicaciones</label>
        <input type="text" class="form-control" name="name_ubicacion">
      </div>
      <div class="form-group col-md-6" style="padding-top: 2.8%;">
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
      </div>
    </div>
  </form>

  <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Creación</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $array )
        <tr data-id="{{$array->Ubicacion_ID}}">
          <td>
            {{$array->Ubicacion_nombre}}
          </td>
          <td>
            {{$array->Ubicacion_creacion}}
          </td>
          <td>
            <a href="#" class="edit_ubicacion" data-id="{{$array->Ubicacion_ID}}"><i class="fas fa-edit"></i></a>
            <a href="#" class="eliminar_ubicacion"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Tienda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('update_ubicacion')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="idU" id="id_ubicacion" value="">
          <div class="form-group">
            <label>Nombre Tienda</label>
            <input type="text" class="form-control" name="name_ubicacion_M" id="name_ubicacion_M">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
$('.eliminar_ubicacion').click(function(){
  var row=$(this).parents('tr');
  var idT=row.data('id');
  $.confirm({
    title: 'Alerta!',
    content: '¿Esta seguro que desea eliminar la Ubicación?',
    buttons: {
      confirm: function () {
        $.ajaxSetup({
          headers:{
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
          }
        });
        $.ajax({
          url:'eliminar-ubicacion',
          data:{id:idT},
          type:'GET',
          success:function(data){
            alert('La Ubicación ha sido eliminada');
            row.fadeOut();
          }
        }).fail(function(){
          alert('La Ubicación no pudo ser eliminada');
        });
      },
      cancel: function () {
      },
    }
  });

});
$('.edit_ubicacion').click(function(){
  var id=$(this).attr('data-id');
  $.get("consulta_ubicacion/"+id,function(result){
    $("#exampleModal").modal();
    $("#id_ubicacion").val(id);
    $("#name_ubicacion_M").val(result[0][0].Ubicacion_nombre);
  })
});
</script>
@endsection
