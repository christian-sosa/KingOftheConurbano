@extends('layouts/Plantilla')

@section('contenido')
<main>
  <div class="usuario">
    <div class="imagen-usuario">
      <img src="/storage/usuarios/{{$usuario->avatar}}" alt="avatar">
    </div>
    <div class="nombre-mas-precio">
      <div class="name"><h4> {{$usuario->name}} </h4></div>
      <div class="email"><h4>{{$usuario->email}} </h4></div>
      <div class="fecha_nac"><h4>{{$usuario->fecha_nac}} </h4></div>
    </div>
    <div class="telefono"><p> {{$usuario->telefono}} </p></div>
  </div>
</main>
@endsection
