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
Route::get('/eliminar/{nombre}','ProductoController@eliminarProducto')->middleware('admin');
Route::get('/agregar', 'ProductoController@agregarProducto')->middleware('admin');
Route::post('/agregar', 'ProductoController@guardarProducto')->middleware('admin');
Route::get('/home/filtrado/{categoria}','ProductoController@filtrarCategoria');
Route::get('/gestorproducto', 'ProductoController@listado2')->middleware('admin');
Route::get('/modificar/{id}','ProductoController@productoYcategoria')->middleware('admin');
Route::post('/modificar', 'ProductoController@modificarProducto')->middleware('admin');
Route::get('/carrito/{id}','CarritoController@agregarProductoACarrito');
Route::post('/carrito', 'CarritoController@eliminarProducto');
Route::post('/carrito/vaciar', 'CarritoController@vaciarCarrito');
Route::get('/carrito', 'CarritoController@mostrarCarrito');
Route::get('/perfil', 'UsuarioController@perfil');
Route::post('/perfil', 'UsuarioController@actualizarInfoUsuario');
Route::get('/usuarios', 'UsuarioController@listaUsuarios')->middleware('admin');
Route::get('/usuario/{id}', 'UsuarioController@mostrarUsuario')->middleware('admin');
Route::get('/usuario/esadmin/{id}', 'UsuarioController@darAdmin')->middleware('admin');
Route::get('/gestor', 'ProductoController@gestor')->middleware('admin');
Route::get('/agregarcategoria', 'CategoriaController@agregarCategoria')->middleware('admin');
Route::post('/agregarcategoria', 'CategoriaController@guardarCategoria')->middleware('admin');
Route::get('/gestorcategoria', 'CategoriaController@listaCategorias')->middleware('admin');
Route::get('/usuario/noesadmin/{id}', 'UsuarioController@quitarAdmin')->middleware('admin');
Route::get('/eliminarcategoria/{id}', 'CategoriaController@eliminarCategoria')->middleware('admin');
