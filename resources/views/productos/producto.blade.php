@extends('layouts/app')
@section('title', 'Productos')
@section('content')
<div class="container">
  <div class="col-md-12">
    <h1>Productos</h1>
  </div>
  <div class="col-md-12">
    <a href="create_producto">
      <button type="button"  class="btn btn-primary btn-lg" name="button"><i class="fas fa-plus"></i> Nuevo Producto</button>
    </a>
  </div>
  <div class="col-md-12">
    <div class="row">
      <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <div class="pull-right">
            <button class="btn btn-default btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
          </div>
        </div>
        <table class="table  table-striped">
          <thead>
            <tr class="filters">
              <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
              <th><input type="text" class="form-control" placeholder="Referencia" disabled></th>
              <th><input type="text" class="form-control" placeholder="Unidades" disabled></th>
              <th><input type="text" class="form-control" placeholder="Categoría" disabled></th>
              <th><input type="text" class="form-control" placeholder="Marca" disabled></th>
              <th><input type="text" class="form-control" placeholder="Costo" disabled></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($consulta as $array )
            <tr data-id="{{$array->Producto_ID}}">
              <td>
                {{$array->Producto_nombre}}
              </td>
              <td>
                {{$array->Producto_referencia}}
              </td>
              <td>
                {{$array->Producto_unidades}}
              </td>
              <td>
                {{$array->categorias}}
              </td>
              <td>
                {{$array->marcas}}
              </td>
              <td>
                {{$array->Producto_costo}}
              </td>
              <td>
                <a href="#" class="edit_producto" data-id="{{$array->Producto_ID}}"><i class="fas fa-edit"></i></a>
                <a href="#" class="eliminar_producto"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
@endsection
@section('scripts')
<script>
$('.filterable .btn-filter').click(function(){
  var $panel = $(this).parents('.filterable'),
  $filters = $panel.find('.filters input'),
  $tbody = $panel.find('.table tbody');
  if ($filters.prop('disabled') == true) {
    $filters.prop('disabled', false);
    $filters.first().focus();
  } else {
    $filters.val('').prop('disabled', true);
    $tbody.find('.no-result').remove();
    $tbody.find('tr').show();
  }
});

$('.filterable .filters input').keyup(function(e){
  /* Ignore tab key */
  var code = e.keyCode || e.which;
  if (code == '9') return;
  /* Useful DOM data and selectors */
  var $input = $(this),
  inputContent = $input.val().toLowerCase(),
  $panel = $input.parents('.filterable'),
  column = $panel.find('.filters th').index($input.parents('th')),
  $table = $panel.find('.table'),
  $rows = $table.find('tbody tr');
  /* Dirtiest filter function ever ;) */
  var $filteredRows = $rows.filter(function(){
    var value = $(this).find('td').eq(column).text().toLowerCase();
    return value.indexOf(inputContent) === -1;
  });
  /* Clean previous no-result if exist */
  $table.find('tbody .no-result').remove();
  /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
  $rows.show();
  $filteredRows.hide();
  /* Prepend no-result row if all rows are filtered */
  if ($filteredRows.length === $rows.length) {
    $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
  }
});
</script>
@endsection
