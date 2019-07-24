@extends('layouts/app')
@section('title', 'Tiendas')
@section('content')
<div class="container">
  <h1>Tiendas</h1>
  <form action="{{route('create_tienda')}}" method="post"  accept-charset="utf-8">
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Nombre Tienda</label>
        <input type="text" class="form-control" name="name_tienda">
      </div>
      <div class="form-group col-md-6">
        <label>Telefono</label>
        <input type="text" class="form-control" name="tel_tienda">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Dirección</label>
        <input type="text" class="form-control" name="dire_tienda">
      </div>
      <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" class="form-control" name="email_tienda">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Contacto</label>
        <input type="text" class="form-control" name="conta_tienda">
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
          <th scope="col">Telefono</th>
          <th scope="col">Dirección</th>
          <th scope="col">Email</th>
          <th scope="col">Contacto</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consulta as $array )
        <tr data-id="{{$array->Tiendas_ID}}">
          <td>
            {{$array->Tiendas_nombre}}
          </td>
          <td>
            {{$array->Tiendas_telefono}}
          </td>
          <td>
            {{$array->Tiendas_direccion}}
          </td>
          <td>
            {{$array->Tiendas_correo}}
          </td>
          <td>
            {{$array->Tiendas_contacto}}
          </td>
          <td>
            <a href="#" class="edit_tienda" data-id="{{$array->Tiendas_ID}}"><i class="fas fa-edit"></i></a>
            <a href="#" class="eliminar_tienda"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
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
          <form  action="{{route('update_tienda')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="idT" id="id_tienda" value="">
            <div class="form-group">
              <label>Nombre Tienda</label>
              <input type="text" class="form-control" name="name_tienda_M" id="name_tienda_M">
            </div>
            <div class="form-group">
              <label>Telefono</label>
              <input type="text" class="form-control" name="tel_tienda_M" id="tel_tienda_M">
            </div>
            <div class="form-group">
              <label>Dirección</label>
              <input type="text" class="form-control" name="dire_tienda_M" id="dire_tienda_M">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email_tienda_M" id="email_tienda_M">
            </div>
            <div class="form-group">
              <label>Contacto</label>
              <input type="text" class="form-control" name="conta_tienda_M" id="conta_tienda_M">
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
  $('.eliminar_tienda').click(function(){
    var row=$(this).parents('tr');
    var idT=row.data('id');
    $.confirm({
      title: 'Alerta!',
      content: '¿Esta seguro que desea eliminar la Tienda?',
      buttons: {
        confirm: function () {
          $.ajaxSetup({
            headers:{
              'X-CSRF-Token': $('meta[name=_token]').attr('content')
            }
          });
          $.ajax({
            url:'eliminar-tienda',
            data:{id:idT},
            type:'GET',
            success:function(data){
              alert('La Tienda ha sido eliminada');
              row.fadeOut();
            }
          }).fail(function(){
            alert('La Tienda no pudo ser eliminada');
          });
        },
        cancel: function () {
        },
      }
    });
  });

  $('.edit_tienda').click(function(){
    var id=$(this).attr('data-id');
    $.get("consulta_tienda/"+id,function(result){
      $("#exampleModal").modal();
      $("#id_tienda").val(id);
      $("#name_tienda_M").val(result[0][0].Tiendas_nombre);
      $("#tel_tienda_M").val(result[0][0].Tiendas_telefono);
      $("#dire_tienda_M").val(result[0][0].Tiendas_direccion);
      $("#email_tienda_M").val(result[0][0].Tiendas_correo);
      $("#conta_tienda_M").val(result[0][0].Tiendas_contacto);
    })
  });
  </script>
  @endsection
