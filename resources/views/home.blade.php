@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/home.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form class="" action="" method="get">
      <label for="nombre">Titulo</label>
      <input type="text" class="form-control" name="nombre" value="@if(isset($_GET['nombre'])){{$_GET['nombre']}}@endif">
      <label for="title">Categoria</label>
      <select class="form-control" name="categoria_id">
        <option value="">---N/A---</option>
        @foreach ($categorias as $categoria)
          <option value="{{ $categoria['id']}}"
            @if(isset($_GET['categoria_id']) && $_GET['categoria_id'] == $categoria['id']) selected @endif>
            {{$categoria['nombre']}}
          </option>
        @endforeach
      </select>
      <button class="boton" type="submit">Filtrar</button>
      <a href="/home">Limpiar busqueda</a>
    </form>
    <section class="productos">
      @foreach ($productos as $producto)
        <article class="producto">
          <div class="imagen-producto">
            <img src="/storage/{{$producto->imagen}}">
          </div>
          <div class="nombre-precio">
            <div class="nombre"><h4>{{$producto->nombre}}</h4></div>
            <div class="precio"><h4>${{$producto->precio}}</h4></div>
          </div>
          <div class="descripcion"><p>{{$producto->descripcion}}</p></div>
          <div class="botones">
            <form action="/home/producto/{{$producto->id}}" method="get">
              <button type="submit" class="boton">Ver en detalle</button>
            </form>
            <form action="/carrito/agregarproducto" method="post">
              @csrf
              <input type="hidden" name="producto_id" value="{{$producto->id}}">
              <button type="submit" class="boton"><i class="fas fa-cart-plus"></i> Añadir al carro</button>
            </form>
          </div>
        </article>
      @endforeach
    </section>
  </main>
  {{$productos->links()}}
</div>
@endsection
