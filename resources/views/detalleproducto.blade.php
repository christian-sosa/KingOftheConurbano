@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/detalleproducto.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form class="" action="/home" method="get">
      <button type="submit" class="boton">Volver</button>
    </form>
    <div class="producto">
      <div class="imagen-producto">
        <img src="/storage/{{$producto->imagen}}" alt="pantalon">
      </div>
      <div class="info-producto">
        <div class="nombre-precio">
          <div class="nombre">
          <h4>{{$producto->nombre}}</h4>
        </div>
          <div class="precio">
            <h4>${{$producto->precio}}</h4>
          </div>
        </div>
        <div class="categoria">
          <h4>{{$producto->categoria->nombre}}</h4>
        </div>
        <div class="descripcion">
          <p>{{$producto->descripcion}}</p>
        </div>
        <div class="botones">
          <form action="/carrito/agregarproducto" method="post">
            @csrf
            <input type="hidden" name="producto_id" value="{{$producto->id}}">
            <button type="submit" class="boton"><i class="fas fa-cart-plus"></i> Añadir al carro</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
