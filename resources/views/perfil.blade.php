@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/perfil.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <div class="card">
      <img src="/storage/{{$user->avatar}}" class="card-img-top" alt="avatar">
      <ul class="list-group list-group-flush">
        <li class="list-group-item name"><span class="card-text">{{$user->name}}</span><span>Editar</span></li>
        <li class="list-group-item email"><span class="card-text">{{$user->email}}</span><span>Editar</span></li>
        <li class="list-group-item fecha_nac"><span class="card-text">{{$user->fecha_nac}}</span><span>Editar</span></li>
        <li class="list-group-item telefono"><span class="card-text">{{$user->telefono}}</span><span>Editar</span></li>
      </ul>
    </div>
  </main>
</div>
@endsection
