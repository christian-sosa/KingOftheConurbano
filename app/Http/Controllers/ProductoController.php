<?php

namespace App\Http\Controllers;
use App\producto;
use App\categoria;

use Illuminate\Http\Request;


class ProductoController extends Controller
{
   public function listado()
   {
   $producto = producto::all();
   return view("home",compact("producto"));
   //MUESTRA EL HOME CON EL LISTADO DE TODOS LOS PRODUCTOS CARGADOS
   }

   public function buscarPorId($id)
   {
     $producto = producto::find($id);
     return view('detalle',compact('producto'));
     // BUSCA UN PRODUCTO POR ID Y LO DEVUELVE A UNA VISTAA

   }
   public function agregarProducto(Request $req)
   {
     $this->validate($req,[
      'nombre'=>'unique:movies,title|max:20|required',
      'descripcion'=>'required||min:0|max:100',
      'precio'=>'required|integer|min:0'
    ],[
      'required'=>'campo obligarorio',
      'unique'=>'unico',
      'max'=>'maximo',
      'numeric'=>'numero',
      'min'=>'minumio',
      'integer'=>'integer'
    ]);
     $producto = new producto();
     $producto->nombre = $req['nombre'];
     $producto->descripcion = $req['descripcion'];
     $producto->precio = $req['precio'];
     $producto->imagen = basename($req->file('imagen')->store('public'));
     $producto->save();

     return view('muestra',compact('producto'));
     //AGREGAR UN PRODUCTO
     //VALIDA FORMULARIO, INSERTA EN BASE DE DATOS Y TE MANDA AL HOME
   }

   public function eliminarProducto($id)
   {
     $producto = producto::find($id);
     $producto->delete();
     return redirect('home');
     //RECIBE ID , LO BUSCA Y SE VA DELETEADO
   }
   public function categoria(){
     $categoria = categoria::all();

     return view('agregar',compact('categoria'));

   }
}
