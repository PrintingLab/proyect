@extends('layouts/app')

@section('title', 'Empresa')


@section('content')


<div class="container">

  <form action="{{route('create_empresa')}}" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
  {{csrf_field()}}

    <div class="form-group">
      <label for="exampleFormControlInput1">Nombre Empresa</label>
      @if(isset($E_name))
      <input type="text" class="form-control" name="name_empresa"  placeholder='{{$E_name}} '>
      @else
      <input type="text" class="form-control" name="name_empresa"  placeholder="Nombre Empresa">
      @endif
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Telefono</label>
      @if(isset($E_tel))
      <input type="text" class="form-control" name="name_empresa"  placeholder='{{$E_tel}} '>
      @else
      <input type="text" class="form-control" name="telefono" placeholder="Telefono">
      @endif
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Dirección</label>
      @if(isset($E_dir))
      <input type="text" class="form-control" name="name_empresa"  placeholder='{{$E_dir}} '>
      @else
      <input type="text" class="form-control" name="direccion" placeholder="Dirección">
      @endif
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Correo</label>
      @if(isset($E_mail))
      <input type="text" class="form-control" name="name_empresa"  placeholder='{{$E_mail}} '>
      @else
      <input type="email" class="form-control" name="email" placeholder="Correo">
      @endif
          </div>

    <div class="form-group">
      <label for="exampleFormControlFile1">Logo</label>
      <input type="file" class="form-control-file" name="logo">


@if(isset($E_name))

@endif
    </div>

    <button type="submit" class="btn btn-primary mb-2">Guardar</button>

  </form>

</div>

@endsection
