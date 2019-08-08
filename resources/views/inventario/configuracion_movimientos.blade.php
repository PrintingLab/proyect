@extends('layouts/app')
@section('title', 'Inventario')
@section('content')
<div class="container">

  <h1>Configuración de Movimientos</h1>

  <form action="{{route('create_configuracion_movimientos')}}" method="post">
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Nombre Movimiento</label>
        <input type="text" class="form-control" name="name_movimientos_inventario">
      </div>
      <div class="form-group col-md-3">
        <label>Tipo Movimiento</label>
        <select class="form-control" id="exampleFormControlSelect2" name="tipo_movimiento">
          <option value="Entrada">Entrada</option>
          <option value="Salida">Salida</option>
        </select>
      </div>
      <div class="form-group col-md-3" style="padding-top: 2.8%;">
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
      </div>
    </div>
  </form>

  <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Tipo</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $array )
        <tr data-id="{{$array->MovimientosInventario_ID}}">
          <td>
            {{$array->MovimientosInventario_nombre}}
          </td>
          <td>
            {{$array->MovimientosInventario_tipo}}
          </td>
          <td>
            <a href="#" class="edit_movimientoI" data-id="{{$array->MovimientosInventario_ID}}"><i class="fas fa-edit"></i></a>
            <a href="#" class="eliminar_movimientoI"><i class="fas fa-trash"></i></a>
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
        <form  action="{{route('update_configuracion_movimientos')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="id_CMI" id="id_CMI" value="">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="id_CMI_name" id="id_CMI_name">
          </div>
          <div class="form-group">
            <label>Tipo Movimiento</label>
            <select class="form-control" id="id_CMI_tipo" name="id_CMI_tipo">
              <option value="Entrada">Entrada</option>
              <option value="Salida">Salida</option>
            </select>
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
$('.eliminar_movimientoI').click(function(){
  var row=$(this).parents('tr');
  var idT=row.data('id');
  $.confirm({
    title: 'Alerta!',
    content: '¿Esta seguro que desea eliminar la Categoría?',
    buttons: {
      confirm: function () {
        $.ajaxSetup({
          headers:{
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
          }
        });
        $.ajax({
          url:'eliminar-configuracion_movimientos',
          data:{id:idT},
          type:'GET',
          success:function(data){
            alert('La Categoría ha sido eliminada');
            row.fadeOut();
          }
        }).fail(function(){
          alert('La Categoría no pudo ser eliminada');
        });
      },
      cancel: function () {
      },
    }
  });

});
$('.edit_movimientoI').click(function(){
  var id=$(this).attr('data-id');
  $.get("consulta_configuracion_movimientos/"+id,function(result){
    $("#exampleModal").modal();
    $("#id_CMI").val(id);
    $("#id_CMI_name").val(result[0][0].MovimientosInventario_nombre);
    $("#id_CMI_tipo").val(result[0][0].MovimientosInventario_tipo);
  })
});
</script>
</div>
@endsection
