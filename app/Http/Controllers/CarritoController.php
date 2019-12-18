<?php

namespace App\Http\Controllers;
use App\Carrito;
use App\User;
use App\Producto;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregarProductoACarrito(Request $request)
    {
      $user = request()->user();

      $user->productos()->attach($request->producto_id);

      return redirect('/carrito');
    }

    public function mostrarCarrito()
    {
      $productos = request()->user()->productos;

      $total = 0;

      foreach($productos as $producto) {
        $total += $producto->precio;
      }

      return view('carrito', compact('productos', 'total'));
    }

    public function quitarProductoDelCarrito(Request $request) {
      $user = request()->user();

      $user->productos()->detach($request->producto_id);

      return redirect('/carrito');
    }

    public function vaciarCarrito() {
      $user = request()->user();

      $user->productos()->detach();

      return redirect('/carrito');
    }
}
