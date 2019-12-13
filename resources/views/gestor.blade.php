@extends('layouts/Plantilla')

@section('contenido')
  <div class="container">
    <main>
      <div class="botones">
        <button type="button" name="button"><a href="/gestorproducto">Gestor productos</a></button>
        <button type="button" name="button"><a href="/gestorcategoria">Gestor categoria</a></button>
        <button type="button" name="button"><a href="/usuarios">usuarios</a></button>
      </div>
    </main>
  </div>
@endsection
