<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function perfil(Request $request)
    {
      $user = $request->user();

      return view('perfil', compact('user'));
    }

    public function actualizarInfoUsuario(Request $request)
    {
      $this->validate($request,
      [
        'name' => ['string', 'max:255', 'nullable'],
        'email' => ['string', 'email', 'max:255', 'unique:users', 'nullable'],
        'telefono' => ['numeric', 'nullable'],
        'fecha_nac' => ['date', 'nullable'],
        'avatar' => ['mimes:png,jpg,jpeg', 'nullable'],
      ],
      [
        'unique'=>'Ya existe un usuario con ese :attribute',
        'max'=>'El campo :attribute excede los caracteres maximos (:max)',
        'min'=>'El campo :attribute no cumple con el minimo requerido (:min)',
        'integer'=>'El campo :attribute debe ser un numero entero',
        'mimes'=>'El campo :attribute solo puede ser png,jpg o jpeg',
        'file'=>'El campo :attribute debe ser un archivo'
      ]);

      $usuario = $request->user();
      if($request->name)
        $usuario->name = $request->name;
      if($request->email)
        $usuario->email = $request->email;
      if($request->telefono)
        $usuario->telefono = $request->telefono;
      if($request->fecha_nac)
        $usuario->fecha_nac = $request->fecha_nac;
      if($request->avatar)
        $usuario->avatar = basename($request->file('avatar')->store('public'));

      $usuario->save();

      return redirect('/perfil');
    }

    public function listaUsuarios(Request $request)
    {
      if($request->email) {
        $usuarios = User::where('email','like','%' . $request->email . '%')->paginate(9);
      } else {
        $usuarios = User::paginate(9);
      }

      return view('gestorusuarios',compact("usuarios"));
    }

    public function mostrarUsuario($id)
    {
      $usuario = User::find($id);
      return view('detalleusuario',compact("usuario"));
    }
    public function darAdmin(Request $request)
    {
      $usuario = User::find($request->usuario_id);
      $usuario->es_admin = 1;
      $usuario->save();
      $usuarios = User::paginate(9);
      return view('gestorusuarios',compact("usuarios"));
    }

    public function quitarAdmin(Request $request)
    {
      $usuario = User::find($request->usuario_id);
      $usuario->es_admin = 0;
      $usuario->save();
      $usuarios = User::paginate(9);
      return view('gestorusuarios',compact("usuarios"));
    }
}
