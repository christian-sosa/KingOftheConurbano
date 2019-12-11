@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/perfil.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form class="card" action="/perfil" method="post">
      <img src="/storage/{{$user->avatar}}" class="card-img-top" alt="avatar">
      <ul class="list-group list-group-flush">
        <li class="list-group-item name" onclick='modificar("name")'>
          <span class="card-text">{{$user->name}}</span><span>Editar</span>
        </li>
        <li class="list-group-item email" onclick='modificar("email")'>
          <span class="card-text">{{$user->email}}</span><span>Editar</span>
        </li>
        <li class="list-group-item fecha_nac" onclick='modificar("fecha_nac")'><span class="card-text">
          {{$user->fecha_nac}}</span><span>Editar</span>
        </li>
        <li class="list-group-item telefono" onclick='modificar("telefono")'>
          <span class="card-text">{{$user->telefono}}</span><span>Editar</span>
        </li>
      </ul>
    </form>
  </main>
</div>
@endsection

@section('script')
<script src='/js/perfil.js'></script>
@endsection
