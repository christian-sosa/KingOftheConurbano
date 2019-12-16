<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Categoria;

use Illuminate\Http\Request;


class ProductoController extends Controller
{
   public function listado(Request $request)
   {
     $categorias = Categoria::all();

     if($request->nombre && $request->categoria_id) {
       $productos = Producto::where('nombre','like','%' . $request->nombre . '%')->where('categoria_id','=',$request->categoria_id)->paginate(9);
    } else if($request->categoria_id) {
       $productos = Categoria::find($_GET['categoria_id'])->productos()->paginate(9);
     } else if($request->nombre) {
       $productos = Producto::where('nombre','like','%' . $request->nombre . '%')->paginate(9);
     } else {
       $productos = Producto::paginate(9);
     }

     return view('home',compact('productos', 'categorias'));
     //MUESTRA EL HOME CON EL LISTADO DE TODOS LOS PRODUCTOS CARGADOS
   }
   public function listado2()
   {
   $productos = Producto::paginate(9);
   return view("gestorproductos",compact("productos"));
   //MUESTRA EL GESTOR CON EL LISTADO DE TODOS LOS PRODUCTOS CARGADOS
   //SUJETO A CAMBIOS
   }

   public function detalle($id)
   {
     $producto = Producto::find($id);
     return view('detalleproducto', compact('producto'));
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

   public function eliminarProducto(Request $request)
   {
     $producto = Producto::where('id','=',$request->producto_id);

     $producto->delete();

     return redirect('/gestorproductos');
   }
   
   public function modificarProducto(Request $req)
   {
     $this->validate($req,
     [
      'nombre'=>'unique:productos|string|max:20|nullable',
      'descripcion'=>'string|max:100|nullable',
      'precio'=>'integer|min:0|nullable',
      'imagen' => 'mimes:jpeg,jpg,png|file|nullable',
      'categoria_id' => 'integer'
    ],
    [
      'unique'=>'El campo :attribute es requerido',
      'max'=>'El campo :attribute excede los caracteres maximos (:max)',
      'min'=>'El campo :attribute no cumple con el minimo requerido (:min)',
      'integer'=>'El campo :attribute debe ser un numero entero',
      'mimes'=>'El campo :attribute solo puede ser png,jpg o jpeg',
      'file'=>'El campo :attribute debe ser un archivo'
    ]);

    $producto = Producto::find($req->id);
    if($req->nombre)
      $producto->nombre = $req->nombre;
    if($req->precio)
      $producto->precio = $req->precio;
    if($req->descripcion)
      $producto->descripcion = $req->descripcion;
    if($req->imagen)
      $producto->imagen = basename($req->file('imagen')->store('public'));
    $producto->categoria_id = $req->categoria_id;

    $producto->save();

    return redirect('/gestorproductos');
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

   public function gestor()
   {
     return view('gestor');
   }

}
