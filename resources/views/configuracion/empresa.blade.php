@extends('layouts/app')
@section('title', 'Empresa')
@section('content')
<div class="container">
<h1>Empresa</h1>
@if($E_name=="")
  <form action="{{route('create_empresa')}}" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <label >Nombre Empresa</label>
      <input type="text" class="form-control" name="name_empresa"  placeholder="Nombre Empresa">
    </div>
    <div class="form-group">
      <label >Telefono</label>
      <input type="text" class="form-control" name="telefono" placeholder="Telefono">
    </div>
    <div class="form-group">
      <label >Dirección</label>
      <input type="text" class="form-control" name="direccion" placeholder="Dirección">
    </div>
    <div class="form-group">
      <label >Correo</label>
      <input type="email" class="form-control" name="email" placeholder="Correo">
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Logo</label>
      <input type="file" class="form-control-file" name="logo">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Guardar</button>
  </form>
@else
  <form action="{{route('update_empresa')}}" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <label >Nombre Empresa</label>
      <input type="text" class="form-control" name="name_empresa_u"  value='{{$E_name}}'>
    </div>
    <div class="form-group">
      <label >Telefono</label>
      <input type="text" class="form-control" name="name_tel_u"  value='{{$E_tel}}'>
    </div>
    <div class="form-group">
      <label >Dirección</label>
      <input type="text" class="form-control" name="name_direccion_u"  value='{{$E_dir}}'>
    </div>
    <div class="form-group">
      <label >Correo</label>
      <input type="text" class="form-control" name="name_email_u"  value='{{$E_mail}}'>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Logo</label>
      <input type="file" class="form-control-file" name="logo_u">
      <img src="img/empresa/{{$E_img}}" style="width: 174px;">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
  </form>
@endif
</div>

@endsection
