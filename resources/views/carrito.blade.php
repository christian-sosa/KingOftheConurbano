@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/carrito.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form class="" action="/home" method="get">
      <button type="submit" class="boton">Volver</button>
    </form>
    @if(sizeof($productos))
      <h4>En mi carro actualmente: </h4>
      @foreach($productos as $producto)
        <article class="producto">
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
              <form class="" action="/carrito/quitarproducto" method="post">
                @csrf
                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                <button type="submit" class="boton"><i class="fas fa-times"></i>Quitar del carrito</button>
              </form>
            </div>
          </div>
        </article>
      @endforeach
    @else
      <h4>No posee productos en su carro actualmente.</h4>
    @endif
    <div class="total row">
      <div class="texto text-center col-3">
        <h2>Total</h2>
      </div>
      <div class="final text-center col-3">
        <h2>${{$total}}</h2>
      </div>
      @if(sizeof($productos))
        <div class="vaciar-carro col-6 text-center">
          <form class="" action="/carrito/vaciar" method="post">
            @csrf
            <button class="boton" type="submit" name="button">Vaciar carrito</button>
          </form>
        </div>
      @endif
    </div>
  </main>
</div>
@endsection
