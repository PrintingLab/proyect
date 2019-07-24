@extends('layouts/app')
@section('title', 'Marca')
@section('content')
<div class="container">
  <h1>Marca</h1>

    <form action="{{route('create_marca')}}" method="post">
      {{csrf_field()}}
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Nombre Marca</label>
          <input type="text" class="form-control" name="name_marca">
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
          <tr data-id="{{$array->Marca_ID}}">
            <td>
              {{$array->Marca_nombre}}
            </td>
            <td>
              <a href="#" class="edit_marca" data-id="{{$array->Marca_ID}}"><i class="fas fa-edit"></i></a>
              <a href="#" class="eliminar_marca"><i class="fas fa-trash"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Editar Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('update_marca')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="idM" id="id_marca" value="">
          <div class="form-group">
            <label>Nombre Marca</label>
            <input type="text" class="form-control" name="name_marca_M" id="name_marca_M">
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
$('.eliminar_marca').click(function(){
  var row=$(this).parents('tr');
  var idT=row.data('id');
  $.confirm({
    title: 'Alerta!',
    content: '¿Esta seguro que desea eliminar la Marca?',
    buttons: {
      confirm: function () {
        $.ajaxSetup({
          headers:{
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
          }
        });
        $.ajax({
          url:'eliminar-marca',
          data:{id:idT},
          type:'GET',
          success:function(data){
            alert('La Marca ha sido eliminada');
            row.fadeOut();
          }
        }).fail(function(){
          alert('La Marca no pudo ser eliminada');
        });
      },
      cancel: function () {
      },
    }
  });

});
$('.edit_marca').click(function(){
  var id=$(this).attr('data-id');
  $.get("consulta_marca/"+id,function(result){
    $("#exampleModal").modal();
    $("#id_marca").val(id);
    $("#name_marca_M").val(result[0][0].Marca_nombre);
  })
});
</script>
</div>
@endsection
