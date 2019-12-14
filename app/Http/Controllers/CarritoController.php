<?php

namespace App\Http\Controllers;
use App\Carrito;
use App\Producto;
use App\Categoria;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregarProductoACarrito($idUser , $idProducto)
    {
      $carrito = new Carrito();
      $carrito->usuario_id = $idUser;
      $carrito->producto_id = $idProducto;
      $carrito->save();
      return redirect('/home');
    }
    public function mostrarCarrito($id)
    {
      $carritos = Carrito::where('usuario_id','=',$id)->get();
      $productos = Producto::where('id','=',$carritos->producto_id)->get();
      return view('carrito',compact('productos'));
    }
}
