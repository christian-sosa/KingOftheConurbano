@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/gestorproductos.css">

@section('contenido')
<div class="container">
  <main>
    <form action="/gestor" method="get">
      <button type="submit" class="boton"><i class="fas fa-arrow-left"></i>Volver</button>
    </form>
    <form action="/agregar" method="get">
      <button class="boton" type="submit" name="button"><i class="fas fa-plus"></i>Agregar producto</button>
    </form>
    <section class="productos">
      @foreach ($productos as $producto)
        <article class="producto">
          <div class="imagen-producto">
            <img src="/storage/{{$producto->imagen}}" alt="Imagen no disponible">
          </div>
          <div class="nombre-precio">
            <div class="nombre">
              <h4>{{$producto->nombre}}</h4>
            </div>
            <div class="precio">
              <h4>${{$producto->precio}}</h4>
            </div>
          </div>
          <div class="categoria">
            <h5>{{$producto->categoria->nombre}}</h5>
          </div>
          <div class="descripcion">
            <p>{{$producto->descripcion}}</p>
          </div>
          <div class="botones">
            <form action="/modificar/{{$producto->id}}" method="get">
              <button type="submit" class="boton col-12" name="button"><i class="fas fa-tools"></i>Modificar producto</button>
            </form>
            <form action="/eliminar" method="post">
              @csrf
              <input type="hidden" name="producto_id" value="{{$producto->id}}">
              <button type="submit" class="boton col-12" name="button"><i class="fas fa-times"></i>Quitar del catalogo</button>
            </form>
          </div>
        </article>
      @endforeach
    </section>
  </main>
</div>
@endsection
