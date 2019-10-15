@extends('layouts/app')
@section('title', 'Empleados')
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


  @endsection

  @section('scripts')
  
  @endsection
