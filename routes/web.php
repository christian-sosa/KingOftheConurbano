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
Route::get('/', 'ProductoController@listadoHome');
Route::get('/faq', 'ProductoController@faq');
Route::get('/contacto' , 'ProductoController@contacto');
Route::get('/home', 'ProductoController@listadoHome');
Route::get('/home/producto/{id}','ProductoController@detalle');
Route::post('/eliminar','ProductoController@eliminarProducto')->middleware('admin');
Route::get('/agregar', 'ProductoController@agregarProducto')->middleware('admin');
Route::post('/agregar', 'ProductoController@guardarProducto')->middleware('admin');
Route::get('/modificar/{id}','ProductoController@productoYcategoria')->middleware('admin');
Route::post('/modificar', 'ProductoController@modificarProducto')->middleware('admin');
Route::post('/carrito/agregarproducto','CarritoController@agregarProductoACarrito');
Route::post('/carrito/quitarproducto', 'CarritoController@quitarProductoDelCarrito');
Route::post('/carrito/vaciar', 'CarritoController@vaciarCarrito');
Route::get('/carrito', 'CarritoController@mostrarCarrito');
Route::get('/perfil', 'UsuarioController@perfil');
Route::post('/perfil', 'UsuarioController@actualizarInfoUsuario');

Route::get('/usuario/{id}', 'UsuarioController@mostrarUsuario')->middleware('admin');

// Gestor y sus funcionalidades
Route::get('/gestor', 'ProductoController@gestor')->middleware('admin');
Route::get('/gestorusuarios', 'UsuarioController@listaUsuarios')->middleware('admin');
Route::get('/gestorproductos', 'ProductoController@listadoGestor')->middleware('admin');
Route::get('/gestorcategorias', 'CategoriaController@listaCategorias')->middleware('admin');


Route::get('/agregarcategoria', 'CategoriaController@agregarCategoria')->middleware('admin');
Route::post('/agregarcategoria', 'CategoriaController@guardarCategoria')->middleware('admin');
Route::post('/gestorcategorias', 'CategoriaController@eliminarCategoria')->middleware('admin');

Route::post('/usuario/quitaradmin', 'UsuarioController@quitarAdmin')->middleware('admin');
Route::post('/usuario/daradmin', 'UsuarioController@darAdmin')->middleware('admin');
