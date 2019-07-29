@extends('layouts/app')
@section('title', 'Inventario')
@section('content')
<div class="container">
  <div class="col-md-12">
    <h1>Carga de Inventario</h1>
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
      <label>Categoría</label>
      <select class="form-control" name="Tienda" required>
        <option value="" disabled selected>Tienda</option>
        @foreach ($consultaT as $array)
        <option value="{{$array->Tiendas_ID}}">{{$array->Tiendas_Nombre}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group col-md-4">
      <label>Costo</label>
      <!--    <input type="text" class="form-control" name="producto" id="IdP" >-->

      <div id="custom-search-input">
        <div class="input-group">
          <input id="search" name="search" type="text" class="form-control" placeholder="Search" />
        </div>
      </div>
    </div>

  </div>

</div>
@endsection
@section('scripts')
<script>
/*
$('#IdP').autocomplete({
source: function( request, response ) {
$.ajax({
url: "auto_consulta_product",
dataType: "jsonp",
data: {
q: request.term
},
success: function(data) {
console.log(data);
response( data );

}
});
},

});

*/

$(document).ready(function() {


  $( "#search" ).keyup(function(){

    var query =$("#search").val();
    console.log(query);

    if (query.length >2) {
      $.ajax({
        url: "{{url('auto_consulta_product')}}",
        data: {
          term : query
        },
        dataType: "json",
        success: function(data){

          console.log(data);

        },
        dataType:'text'

      })

    }

  });



  /*
  $( "#search" ).autocomplete({
  source: function(request, response) {
  $.ajax({
  url: "{{url('auto_consulta_product')}}",
  data: {
  term : request.term
},
dataType: "json",
success: function(data){
console.log(data);
var values = $.map(data, function(item) {
return {
value: item.Producto_nombre,id: item.Producto_ID};
});
response(values);
}
});
},
minLength: 1
});
*/

});
</script>
@endsection
