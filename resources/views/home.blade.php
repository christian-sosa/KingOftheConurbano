@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/home.css">
@endsection

@section('contenido')
<div class="container">
  <main>
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
            <form action="/home/{{$producto->id}}" method="get">
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
