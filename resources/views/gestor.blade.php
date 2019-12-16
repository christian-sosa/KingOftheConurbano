@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/gestor.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <div class="botones">
      <form action="/gestorproductos" method="get">
        <button type="submit" class="boton col-11" name="button">
          <h2>Gestor de productos</h2>
          <p>Agregue, elimine o modifique la informacion de los productos</p>
        </button>
      </form>
      <form action="/gestorcategorias" method="get">
        <button type="submit" class="boton col-11" name="button">
          <h2>Gestor de categorias</h2>
          <p>Agregue o elimine categorias</p>
        </button>
      </form>
      <form action="/gestorusuarios" method="get">
        <button type="submit" class="boton col-11" name="button">
          <h2>Gestor de usuarios</h2>
          <p>Otorgue la funcionalidad de admin a algun usuario desde aqui</p>
        </button>
      </form>
    </div>
  </main>
</div>
@endsection
