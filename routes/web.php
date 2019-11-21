<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/faq', 'ProductoController@faq');
Route::get('/contacto' , 'ProductoController@contacto');
Route::get('/home', 'ProductoController@listado');
Route::get('/home/{id}','ProductoController@detalle');
Route::get('/eliminar/{nombre}','ProductoController@eliminarProducto');
Route::get('/agregar', 'ProductoController@agregarProducto');
Route::post('/agregar', 'ProductoController@guardarProducto');
Route::get('/home/filtrado/{categoria}','ProductoController@filtrarCategoria');
Route::get('/gestor', 'ProductoController@listado2');
Route::get('/modificar/{id}','ProductoController@productoYcategoria');
Route::post('/modificar', 'ProductoController@modificarProducto');
