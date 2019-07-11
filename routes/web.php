<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','LoginController@Login');

Route::get('Dashboard','DashboardController@Dashboard');

Route::get('/empresa','EmpresaController@EmpresaIndex');
Route::post('empresa','EmpresaController@CrearEmpresa')->name('create_empresa');
