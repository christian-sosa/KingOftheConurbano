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
Route::get('/', 'ProductoController@listado');
Route::get('/faq', 'ProductoController@faq');
Route::get('/contacto' , 'ProductoController@contacto');
Route::get('/home', 'ProductoController@listado');
Route::get('/home/{id}','ProductoController@detalle');
Route::get('/home/filtrado/{categoria}','ProductoController@filtrarCategoria');
Route::get('/gestorproducto', 'ProductoController@listado2');
Route::get('/modificar/{id}','ProductoController@productoYcategoria');
Route::post('/modificar', 'ProductoController@modificarProducto');
Route::get('/perfil', 'UsuarioController@perfil');
Route::post('/perfil', 'UsuarioController@actualizarInfoUsuario');
Route::get('/usuarios', 'UsuarioController@listaUsuarios');
Route::get('/usuario/{id}', 'UsuarioController@mostrarUsuario');
Route::get('/usuario/esadmin/{id}', 'UsuarioController@darAdmin');
Route::get('/gestor', 'ProductoController@gestor');
Route::get('/eliminar/{nombre}','ProductoController@eliminarProducto');
Route::get('/agregar', 'ProductoController@agregarProducto');
Route::post('/agregar', 'ProductoController@guardarProducto');
Route::get('/agregarcategoria', 'CategoriaController@agregarCategoria');
Route::post('/agregarcategoria', 'CategoriaController@guardarCategoria');
Route::get('/gestorcategoria', 'CategoriaController@listaCategorias');
Route::get('/usuario/noesadmin/{id}', 'UsuarioController@quitarAdmin');
Route::get('/eliminarcategoria/{id}', 'CategoriaController@eliminarCategoria');
Route::get('/agregarcarrito/{iduser}/{idproducto}', 'CarritoController@agregarProductoACarrito');
Route::get('/carrito/{id}','CarritoController@mostrarCarrito');
