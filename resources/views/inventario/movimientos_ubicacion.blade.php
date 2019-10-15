@extends('layouts/app')
@section('title', 'Inventario')
@section('content')
<div class="container" ng-controller="InventariControler_Angular">
  <div class="col-md-12">
    <h1>Movimientos de Ubicacion</h1>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label>Tienda</label>
      <select class="form-control" name="Tienda" ng-model="tienda">
        <option value="" disabled selected>Tienda</option>
        @foreach ($consultaT as $array)
        <option value="{{$array->Tiendas_ID}}">{{$array->Tiendas_Nombre}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-2">
      <label>Movimiento</label>
      <select class="form-control" name="Movimiento" ng-model="movimiento">
        <option value="" disabled selected>Movimiento</option>
        @foreach ($consultaM as $arrayM)
        <option value="{{$arrayM->MovimientosInventario_ID}}">{{$arrayM->MovimientosInventario_nombre}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-3">
      <label>Ubicación</label>
      <select class="form-control" name="ubicacion" ng-model="ubicacion">
        <option value="" disabled selected>Ubicación</option>
        @foreach($consultaU as $ubicacion)
        <option value="{{$ubicacion->Ubicacion_ID}}">{{$ubicacion->Ubicacion_nombre}}</option>
        @endforeach
      </select>
    </div>


    <div class="form-group col-md-3">
      <label>Empleado</label>
      <div class="form-group">
        <input type='text' class="form-control" ng-keyup='fetchUsers()' ng-model='searchText' placeholder='Enter text'>

      </div>
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




    <div class="form-group col-md-1">
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





</div>
@endsection
@section('scripts')
<script src="{{ asset('js/angular_inventario.js') }}"></script>
@endsection
