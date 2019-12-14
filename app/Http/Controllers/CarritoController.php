<?php

namespace App\Http\Controllers;
use App\Carrito;
use App\User;
use App\Producto;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregarProductoACarrito($producto_id)
    {
      $user = request()->user();

      $user->productos()->attach($producto_id);

      return redirect('/carrito');
    }

    public function mostrarCarrito()
    {
      $productos = request()->user()->productos;

      return view('carrito', compact('productos'));
    }

    public function eliminarProducto(Request $request) {
      $user = request()->user();

      $producto_id = $request->producto_id;

      $user->productos()->detach($producto_id);

      return redirect('/carrito');
    }

    public function vaciarCarrito() {
      $user = request()->user();

      $user->productos()->detach();

      return redirect('/carrito');
    }
}
