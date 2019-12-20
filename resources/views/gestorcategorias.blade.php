@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/gestorcategorias.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form action="/gestor" method="get">
      <button type="submit" class="boton"><i class="fas fa-arrow-left"></i>Volver</button>
    </form>
    <form action="/agregarcategoria" method="get">
      <button type="submit" class="boton"><i class="fas fa-arrow-left"></i>Agregar nueva categoria</button>
    </form>
    <section class="categorias">
      @foreach ($categorias as $categoria)
        <article class="categoria">
          <div class="nombre">
            <h4 class="nombre">{{$categoria->nombre}}</h4>
            <h6 class="cantidad-productos"> ({{sizeof($categoria->productos)}} productos)</h6>
          </div>
          <form class="@if(sizeof($categoria->productos)) {{'disabled'}} @endif" action="/gestorcategorias" method="POST">
            @csrf
            <input type="hidden" name="categoria_id" value="{{$categoria->id}}">
            <div class="boton-container">
              <button type="submit" class="boton col-12"  name="button"><i class="fas fa-times"></i>Quitar categoria</button>
            </div>
          </form>
        </article>
      @endforeach
    </section>
  </main>
  {{$categorias->links()}}
</div>
@endsection

@section('script')
<script src="/js/gestorCategoria.js"></script>
@endsection
