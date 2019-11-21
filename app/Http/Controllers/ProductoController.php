<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Categoria;

use Illuminate\Http\Request;


class ProductoController extends Controller
{
   public function listado()
   {
   $productos = Producto::paginate(6);
   return view("home",compact("productos"));
   //MUESTRA EL HOME CON EL LISTADO DE TODOS LOS PRODUCTOS CARGADOS
   }
   public function listado2()
   {
   $productos = Producto::paginate(6);
   return view("gestor",compact("productos"));
   //MUESTRA EL GESTOR CON EL LISTADO DE TODOS LOS PRODUCTOS CARGADOS
   //SUJETO A CAMBIOS
   }

   public function detalle($id)
   {
     $producto = Producto::find($id);
     return view('detalle', compact('producto'));
     // BUSCA UN PRODUCTO POR ID Y LO DEVUELVE A UNA VISTAA

   }
   public function guardarProducto(Request $req)
   {
     $this->validate($req,
     [
      'nombre'=>'required|string|max:20',
      'descripcion'=>'required|string|max:100',
      'precio'=>'required|integer|min:0',
      'imagen' => 'required|mimes:jpeg,jpg,png|file',
      'categoria_id' => 'integer'
    ],
    [
      'required'=>'El campo :attribute es requerido',
      'max'=>'El campo :attribute excede los caracteres maximos (:max)',
      'min'=>'El campo :attribute no cumple con el minimo requerido (:min)',
      'integer'=>'El campo :attribute debe ser un numero entero',
      'mimes'=>'El campo :attribute solo puede ser png,jpg o jpeg',
      'file'=>'El campo :attribute debe ser un archivo'
    ]);

     $producto = new Producto();

     $producto->nombre = $req['nombre'];
     $producto->descripcion = $req['descripcion'];
     $producto->precio = $req['precio'];
     $producto->categoria_id = $req['categoria_id'];
     $producto->imagen = basename($req->file('imagen')->store('public'));

     $producto->save();

     return redirect('/home');
     //AGREGAR UN PRODUCTO
     //VALIDA FORMULARIO, INSERTA EN BASE DE DATOS Y TE MANDA AL HOME
   }

   public function eliminarProducto($id)
   {
     $producto = Producto::where('id','=',$id);
     $producto->delete();

     return redirect('gestor');
     //RECIBE ID , LO BUSCA Y SE VA DELETEADO
   }

   public function filtrarCategoria($categoria_id)
   {
     $productos = Producto::where('categoria_id','=',$categoria_id)->paginate(6);
     return view('home', compact('productos'));
     // RECIBE LA CATEGORIA , BUSCA TODOS LOS PRODUCTOS DE ESA CATEGORIA
     //Y LOS MANDA AL HOME
   }

   public function modificarProducto(Request $req)
   {
     $this->validate($req,
     [
      'nombre'=>'unique:productos|required|string|max:20',
      'descripcion'=>'required|string|max:100',
      'precio'=>'required|integer|min:0',
      'imagen' => 'required|mimes:jpeg,jpg,png|file',
      'categoria_id' => 'integer'
    ],
    [
      'unique'=>'El campo :attribute es requerido',
      'required'=>'El campo :attribute es requerido',
      'max'=>'El campo :attribute excede los caracteres maximos (:max)',
      'min'=>'El campo :attribute no cumple con el minimo requerido (:min)',
      'integer'=>'El campo :attribute debe ser un numero entero',
      'mimes'=>'El campo :attribute solo puede ser png,jpg o jpeg',
      'file'=>'El campo :attribute debe ser un archivo'
    ]);

    $producto = Producto::find($req['id']);
    $producto->nombre = $req->nombre;
    $producto->precio = $req['precio'];
    $producto->descripcion = $req['descripcion'];
    $producto->categoria_id = $req['categoria_id'];
    $producto->imagen = basename($req->file('imagen')->store('public'));

    $producto->save();

    return redirect('/home');
   }
   public function productoYcategoria($id)
   {
     $producto = \App\Producto::find($id);
     $categorias = \App\Categoria::all();
     return view('modificar',compact('producto','categorias'));
   }
   public function agregarProducto()
   {
     $categorias = \App\Categoria::all();
     return view('agregar', compact('categorias'));
   }
   public function faq()
   {
     return view('faq');
   }
   public function contacto()
   {
     return view('contacto');
   }

}
