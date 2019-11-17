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
Route::get('/faq', function () {
  return view('faq');
});
//RUTA A fAQ , NO USA LOGICA
Route::get('/contacto' , function () {
  return view('contacto');
});
// RUTA A CONTACTO , NO USA LOGICA POR AHORA
Route::get('/home', 'ProductoController@listado');
Route::get('/home/{id}','ProductoController@detalle');

Route::get('eliminar','ProductoController@listado');
// SUJETO A CAMBIOS
Route::get('/eliminar/{id}','ProductoController@eliminarProducto');

Route::get('/agregar', function() {
  $categorias = \App\Categoria::all();
  return view('agregar', compact('categorias'));
});

Route::post('/agregar', 'ProductoController@agregar');

Route::post('/muestra','ProductoController@agregarProducto');
