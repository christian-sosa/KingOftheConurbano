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
          <div class="nombre-mas-precio">
            <div class="nombre"><h4>{{$producto->nombre}}</h4></div>
            <div class="precio"><h4>{{$producto->precio}}</h4></div>
          </div>
          <div class="descripcion"><p>{{$producto->descripcion}}</p></div>
          <div class="botones">
            <button class="boton ver-mas"><a href="/home/{{$producto->id}}">Ver en detalle</a></button>
            <button class="boton aniadir-al-carro"><a href="CARRITO"><i class="fas fa-cart-plus"></i> Añadir al carro</a></button>
          </div>
        </article>
      @endforeach
    </section>
  </main>
  {{$productos->links()}}
</div>
@endsection
