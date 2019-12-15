@extends('layouts/Plantilla')

@section('contenido')
<div class="container">
  <main>
    <button type="button" class="boton"><a href="/gestor"><i class="fas fa-arrow-left"></i>Volver</a></button>
    <button type="button" class="boton"><a href="/agregarcategoria"><i class="fas fa-arrow-left"></i>Agregar categoria</a></button>
    <section class="categorias">
      @foreach ($categorias as $categoria)
        <article class="categoria">
          <div class="nombre">
            <div class="nombre"><h4>{{$categoria->nombre}}</h4></div>
          </div>
          <form class="@if(sizeof($categoria->productos) > 0) {{'disabled'}} @endif" action="/gestorcategoria" method="POST">
            @csrf
            <input type="hidden" name="categoria_id" value="{{$categoria->id}}">
            <div class="boton-container">
              <button type="submit" class="boton col-4"  name="button"><i class="fas fa-times"></i>Quitar categoria</button>
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
