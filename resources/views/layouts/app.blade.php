<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--  <link rel="shortcut icon" href="imagenes/favicon-printing-lab.png" type="image/x-icon"/> -->

  <title>@yield('title', '')</title>

  <!-- Styles -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

  <link href="{{ asset('css/css_app.css') }}" rel="stylesheet">

</head>
<body >

  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>User</h3>
      </div>
      <ul class="list-unstyled components">
        <li class="active">
          <a href="#menuProducts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-archive"></i> Productos</a>
          <ul class="collapse list-unstyled" id="menuProducts">
            <li>
              <a href="#">Producto</a>
            </li>
            <li>
              <a href="#">Categoría</a>
            </li>
            <li>
              <a href="#">Marca</a>
            </li>
          </ul>
        </li>

        <li class="active">
          <a href="#menuInventario" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-suitcase"></i> Inventario</a>
          <ul class="collapse list-unstyled" id="menuInventario">
            <li>
              <a href="#">Inventario</a>
            </li>
            <li>
              <a href="#">Movimientos Inventario</a>
            </li>
          </ul>
        </li>

        <li class="active">
          <a href="#menuConfig" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cogs"></i> Configuración</a>
          <ul class="collapse list-unstyled" id="menuConfig">
            <li>
              <a href="empresa">Empresa</a>
            </li>
            <li>
              <a href="#">Tiendas</a>
            </li>
            <li>
              <a href="#">Ubicación</a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-bars"></i>
          </button>
          <!--
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Page</a>
              </li>
            </ul>
          </div>
        -->
        </div>
      </nav>

      @yield('content')
  </div>


  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <script src="{{ asset('js/js_app.js') }}">

  </script>

</body>
</html>
