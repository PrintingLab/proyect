@extends('layouts/app')
@section('title', 'Categoria')
@section('content')
<div class="container">
  <h1>Categoria</h1>
  <form action="{{route('create_categoria')}}" method="post">
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Nombre Categoria</label>
        <input type="text" class="form-control" name="name_categoria">
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
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $array )
        <tr data-id="{{$array->Categoria_ID}}">
          <td>
            {{$array->Categoria_nombre}}
          </td>
          <td>
            <a href="#" class="edit_categoria" data-id="{{$array->Categoria_ID}}"><i class="fas fa-edit"></i></a>
            <a href="#" class="eliminar_categoria"><i class="fas fa-trash"></i></a>
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
        <form  action="{{route('update_categoria')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="idC" id="id_categorias" value="">
          <div class="form-group">
            <label>Nombre Tienda</label>
            <input type="text" class="form-control" name="name_categorias_M" id="name_categorias_M">
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
$('.eliminar_categoria').click(function(){
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
          url:'eliminar-categoria',
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
$('.edit_categoria').click(function(){
  var id=$(this).attr('data-id');
  $.get("consulta_categoria/"+id,function(result){
    $("#exampleModal").modal();
    $("#id_categorias").val(id);
    $("#name_categorias_M").val(result[0][0].Categoria_nombre);
  })
});
</script>
</div>
@endsection
