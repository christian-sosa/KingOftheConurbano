<?php

namespace App\Http\Controllers;
use App\producto;

use Illuminate\Http\Request;


class ProductoController extends Controller
{
   public function listado()
   {
   $aux = producto::all();
   return view("prueba",compact("aux"));

   }
}
