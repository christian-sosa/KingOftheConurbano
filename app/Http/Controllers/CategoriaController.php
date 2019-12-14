<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
  public function agregarCategoria()
  {
    $categorias = \App\Categoria::all();
    return view('agregarcategoria',compact('categorias'));
  }

  public function guardarCategoria(Request $req)
  {
    $this->validate($req,
    [
      'nombre'=>'required|string|max:20'
    ],
    [
      'required'=>'El campo :attribute es requerido',
      'max'=>'El campo :attribute excede los caracteres maximos (:max)'
    ]);
    $categoria = new Categoria();
    $categoria->nombre = $req['nombre'];
    $categoria->save();

    return redirect('/gestorcategoria');
  }

  public function listaCategorias()
  {
    $categorias = Categoria::paginate(9);
    return view('/gestorcategoria',compact('categorias'));
  }

  public function eliminarCategoria($id)
  {
    $categoria=Categoria::where('id','=',$id);
    $categoria->delete();

    return redirect('gestorcategoria');

  }
}