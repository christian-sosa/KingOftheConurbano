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

    return redirect('/gestorcategorias');
  }

  public function listaCategorias()
  {
    $categorias = Categoria::paginate(9);
    return view('/gestorcategorias', compact('categorias'));
  }

  public function eliminarCategoria(Request $request)
  {
    $categoria = Categoria::where('id','=',$request->categoria_id);

    $categoria->delete();

    return redirect('/gestorcategorias');
  }
}
