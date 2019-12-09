<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function perfil(Request $request)
    {
      $user = $request->user();

      return view('perfil', compact('user'));
    }
}
