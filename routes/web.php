<?php
/*
Route::get('/', function () {
return view('welcome');
});
*/


Route::get('Dashboard','DashboardController@Dashboard');
//empresa
Route::get('/empresa','EmpresaController@EmpresaIndex');
Route::post('Create_empresa','EmpresaController@CrearEmpresa')->name('create_empresa');
Route::post('update_empresa','EmpresaController@UpdateEmpresa')->name('update_empresa');
//tienda
Route::get('/tiendas','TiendasController@TiendasIndex');
Route::post('create_tienda','TiendasController@CrearTienda')->name('create_tienda');
Route::get('eliminar-tienda','TiendasController@EliminarTienda');
Route::get('consulta_tienda/{id}','TiendasController@ConsultaTienda');
Route::post('update_tienda','TiendasController@UpdateTienda')->name('update_tienda');

//ubicacion
Route::get('/ubicacion','UbicacionController@UbicacionIndex');
Route::post('create_ubicacion','UbicacionController@CreateUbicacion')->name('create_ubicacion');
Route::get('eliminar-ubicacion','UbicacionController@EliminarUbicacion');
Route::get('consulta_ubicacion/{id}','UbicacionController@ConsultaUbicacion');
Route::post('update_ubicacion','UbicacionController@UpdateUbicacion')->name('update_ubicacion');
//producto
Route::get('/producto','ProductoController@ProductoIndex');
Route::get('create_producto','ProductoController@CrearProducto');
Route::post('add_product','ProductoController@AddProduct')->name('add_product');
//Categoria
Route::get('/categoria','ProductoController@CategoriaIndex');
Route::post('create_categoria','ProductoController@CrearCategoria')->name('create_categoria');
Route::get('eliminar-categoria','ProductoController@EliminarCategoria');
Route::get('consulta_categoria/{id}','ProductoController@ConsultaCategoria');
Route::post('update_categoria','ProductoController@UpdateCategoria')->name('update_categoria');
//Marca
Route::get('/marca','ProductoController@MarcaIndex');
Route::post('create_marca','ProductoController@CrearMarca')->name('create_marca');
Route::get('eliminar-marca','ProductoController@EliminarMarca');
Route::get('consulta_marca/{id}','ProductoController@ConsultaMarca');
Route::post('update_marca','ProductoController@UpdateMarca')->name('update_marca');
//Inventario
Route::get('inventario','InventarioController@InventarioIndex');
Route::get('movimientos_ubicacion','InventarioController@ViewMovimientoUbicacion');
Route::get('carga_inventario','InventarioController@ViewCargaInventario');
Route::post('auto_consulta_product','InventarioController@AutoCompleteProduct')->name('auto_consulta_product');
Route::post('CargaInventario','InventarioController@CargaInventario');

//proyectos
Route::get('/crear_proyectos','ProyectosController@IndexCrear');
Route::get('/{producto}','ProyectosController@Signs')->name('sign');
Route::get('/proceso','ProyectosController@ProcesoView')->name('proceso2');

/*confi*/
Route::get('configuracion_movimientos','InventarioController@ConfigMovimientos');
Route::post('create_configuracion_movimientos','InventarioController@CrearConfigMovimientos')->name('create_configuracion_movimientos');
Route::get('eliminar-configuracion_movimientos','InventarioController@EliminarConfigMovimientos');
Route::get('consulta_configuracion_movimientos/{id}','InventarioController@ConsultaConfigMovimientos');
Route::post('update_configuracion_movimientos','InventarioController@UpdateConfigMovimientos')->name('update_configuracion_movimientos');

//Empleados
Route::get('empleados','EmpleadosController@EmpleadosIndex');

//auth original
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
//auth personalizado
Auth::routes(['register' => false]);

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('registro', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
