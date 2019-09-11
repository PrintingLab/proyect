@extends('layouts/app')
@section('title', 'Inventario')
@section('content')
<style media="screen">

#searchResult{
  padding: 0px;
  z-index: 1;
  position: absolute;
  width: 97%;
}

#searchResult option{

  font-weight: normal;
  display: block;
  white-space: pre;
  min-height: 1.2em;
  padding: 0px 2px 1px;

  display: block;
  width: 100%;
  padding: .375rem .75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: .25rem;
  transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

#searchResult option:not([size]):not([multiple]) {
  height: calc(2.25rem + 2px);
}


#searchResult option:hover{
  color: white;
  background-color: #3490f3;
  border-color: #80bdff;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
  outline: -webkit-focus-ring-color auto 1px;
}
.btn_i{
  padding-top: 2.9%;
}
</style>
<div class="container" ng-controller="InventariControler_Angular" >
  <div class="col-md-12">
    <h1>Carga de Inventario</h1>
  </div>

  <div class="form-row">

    <div class="form-group col-md-2">
      <label>Tienda</label>
      <select class="form-control" name="Tienda" required>
        <option value="" disabled selected>Tienda</option>
        @foreach ($consultaT as $array)
        <option value="{{$array->Tiendas_ID}}">{{$array->Tiendas_Nombre}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group col-md-2">
      <label>Movimiento</label>
      <select class="form-control" name="Movimiento" required>
        <option value="" disabled selected>Movimiento</option>
        @foreach ($consultaM as $arrayM)
        <option value="{{$arrayM->MovimientosInventario_ID}}">{{$arrayM->MovimientosInventario_nombre}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group col-md-3">
      <label>Producto</label>
      <div class="form-group">
        <input type='text' class="form-control" ng-keyup='fetchUsers()' ng-model='searchText' placeholder='Enter text'>
        <ul id='searchResult'  class="option_search" >
          <option ng-click='setValue($index,$event)'ng-repeat="result in searchResult" value=" @{{result.Producto_unidades}} @{{result.Producto_ID}}">
            @{{ result.Producto_nombre }}
          </option>
        </ul>
      </div>
    </div>

    <div class="form-group col-md-2">
      <label>Cantidad</label>
      <input class="form-control" id='cantidad' ng-model="cantidadInput" type="number" ></input>
    </div>

    <div class="form-group col-md-2">
      <label>Medida</label>
      <input class="form-control" id='Medidas_unique' ng-model="Medidas_unique"  disabled></input>
    </div>

    <input type="text" ng-hide="true" class="form-control"  ng-model="id_producto">

    <div class="form-group col-md-2 btn_i" >
      <button type="button" class="btn btn-primary" ng-click="AddTableCI()"><i class="fas fa-plus"></i></button>
    </div>

  </div>


  <div class="col-md-12" >
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Producto</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Medida</th>

        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="data in ArrayTableCargaInventario">
          <td>@{{$index +1}}</td>
          <td>@{{data.nombre}}</td>
          <td>@{{data.cantidad}}</td>
          <td>@{{data.medida}}</td>
          <td ng-hide="true">@{{data.id}}</td>
        </tr>
      </tbody>
    </table>

    <div class="form-group col-md-2 btn_i" >
      <button type="button" class="btn btn-primary" ng-click="FormCargaInventario()"><i class="fas fa-check"></i> Realizar Movimiento</button>
    </div>

  </div>



</div>
@endsection
@section('scripts')
<script src="{{ asset('js/angular_inventario.js') }}"></script>
@endsection
