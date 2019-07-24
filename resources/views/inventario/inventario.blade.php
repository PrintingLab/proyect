@extends('layouts/app')
@section('title', 'Inventario')
@section('content')
<div class="container">
  <div class="col-md-12">
    <h1>Inventario</h1>
  </div>
  <div class="col-md-12">
    <a href="move_inventario">
      <button type="button"  class="btn btn-primary" name="button"><i class="fas fa-exchange-alt"></i> Movimiento de Inventario</button>
    </a>

    <a href="carga_inventario">
      <button type="button"  class="btn btn-primary" name="button"><i class="fas fa-arrow-alt-circle-up"></i> Carga de Inventario</button>
    </a>

  </div>


</div>
@endsection
