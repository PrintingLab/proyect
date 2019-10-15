@extends('layouts/app')
@section('title', 'Proyectos')
@section('content')

<div class="col-md-12 marginrows">
  <h3><i class="fas fa-sign"></i> Signs</h3>
</div>
<div class="row rowsServicios">
  <div class="col-md-2">
    <?php $producto='Awning' ?>
    <a href="{{route('sign',$producto)}}">
      <div class="card">
        <div class="card-body">
          Awning
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <?php $producto='Channel Letters' ?>
    <a href="{{route('sign',$producto)}}">
      <div class="card">
        <div class="card-body">
          Channel Letters
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <?php $producto='Lightbox' ?>
    <a href="{{route('sign',$producto)}}">
      <div class="card">
        <div class="card-body">
          Lightbox
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <?php $producto='Flat Sing' ?>
    <a href="{{route('sign',$producto)}}">
      <div class="card">
        <div class="card-body">
          Flat Sing
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <?php $producto='Pushed Acrylic' ?>
    <a href="{{route('sign',$producto)}}">
      <div class="card">
        <div class="card-body">
          Pushed Acrylic
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <?php $producto='Blade Sings' ?>
    <a href="{{route('sign',$producto)}}">
      <div class="card">
        <div class="card-body">
          Blade Sings
        </div>
      </div>
    </a>
  </div>
</div>

<div class="col-md-12 marginrows">
  <h3><i class="fas fa-car"></i> Vehicle Graphics</h3>
</div>
<div class="row rowsServicios">
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Decals
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Window(s)
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Partial Car Wrap
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Total Car Wrap
        </div>
      </div>
    </a>
  </div>

</div>

<div class="col-md-12 marginrows">
  <h3><i class="fas fa-image"></i> Large Format</h3>
</div>
<div class="row rowsServicios">
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Banner
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Decal
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Window/Door Sticker
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Wall Sticker
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Step and Repeat
        </div>
      </div>
    </a>
  </div>

</div>

<div class="col-md-12 marginrows">
  <h3><i class="fab fa-internet-explorer"></i> Web</h3>
</div>
<div class="row rowsServicios">
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Logo Design
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          E-Flyer
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Facebook Post
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-2">
    <a href="#">
      <div class="card">
        <div class="card-body">
          Instagram Post
        </div>
      </div>
    </a>
  </div>
</div>
@endsection
