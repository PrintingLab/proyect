@extends('layouts/app')
@section('title', 'Productos')
@section('content')

<form class="" action="{{route('add_product')}}" method="post">
  {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Nombre</label>
      <input type="text" class="form-control" name="name_P" required>
    </div>
    <div class="form-group col-md-4">
      <label>Referencia</label>
      <input type="text" class="form-control" name="referencia_P" required>
    </div>
    <div class="form-group col-md-4">
      <label>Unidades</label>
      <input type="text" class="form-control" name="unidades_P" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Costo</label>
      <input type="number" class="form-control" name="costo_P" required>
    </div>
    <div class="form-group col-md-4">
      <label>Marca</label>
      <select class="form-control" name="marca_P" required>
        <option value="" disabled selected>Marca</option>
        @foreach ($marca as $array)
        <option value="{{$array->Marca_ID}}">{{$array->Marca_nombre}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label>Categoría</label>
      <select class="form-control" name="categoria_P" required>
        <option value="" disabled selected>Categoría</option>
        @foreach ($categoria as $array)
        <option value="{{$array->Categoria_ID}}">{{$array->Categoria_nombre}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-check col-md-1">
      <input class="" type="checkbox" value="Activo" name="estado_P">
      <label class="" for="defaultCheck1">
        Activo
      </label>
    </div>
    <div class="form-group col-md-2" style="padding-top: 0.4%;">
      <button type="submit" class="btn btn-primary mb-2">Guardar</button>
    </div>
  </div>
</form>

@endsection
