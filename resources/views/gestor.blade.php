@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/gestor.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <div class="botones row">
      <form action="/gestorproductos" class="col-12 col-md-4" method="get">
        <button type="submit" class="boton col-11" name="button">
          <h2>Gestor de productos</h2>
          <p>Agregue, elimine o modifique la informacion de los productos</p>
        </button>
      </form>
      <form action="/gestorcategorias" class="col-12 col-md-4" method="get">
        <button type="submit" class="boton col-11" name="button">
          <h2>Gestor de categorias</h2>
          <p>Agregue o elimine categorias</p>
        </button>
      </form>
      <form action="/gestorusuarios" class="col-12 col-md-4" method="get">
        <button type="submit" class="boton col-11" name="button">
          <h2>Gestor de usuarios</h2>
          <p>Otorgue la funcionalidad de admin a algun usuario desde aqui</p>
        </button>
      </form>
    </div>
  </main>
</div>
@endsection
