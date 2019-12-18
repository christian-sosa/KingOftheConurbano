@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/home.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form class="filtrar row" action="" method="get">
      <div class="filtrar-nombre text-center col-md-4 row">
        <label class="col-6" for="nombre">Nombre</label>
        <input type="text" class="form-control col-6" name="nombre" value="@if(isset($_GET['nombre'])){{$_GET['nombre']}}@endif">
      </div>
      <div class="filtrar-categoria text-center col-md-4 row">
        <label class="col-6" for="title">Categoria</label>
        <select class="form-control col-6" name="categoria_id">
          <option value="">---N/A---</option>
          @foreach ($categorias as $categoria)
            <option value="{{ $categoria['id']}}"
            @if(isset($_GET['categoria_id']) && $_GET['categoria_id'] == $categoria['id']) selected @endif>
              {{$categoria['nombre']}}
            </option>
          @endforeach
        </select>
      </div>
      <div class="filtrar-botones text-center col-md-4 row">
        <div class="col-md-2"></div>
        <button class="boton col-4" type="submit">Aplicar filtro</button>
        <a class="col-4" href="/home">Limpiar busqueda</a>
      </div>
    </form>
    {{$productos->links()}}
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
    {{$productos->links()}}
  </main>
</div>
@endsection
