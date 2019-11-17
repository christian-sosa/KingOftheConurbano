@extends('layouts/Plantilla')

@section('contenido')
<main>
  <section class="productos">
    @foreach ($productos as $producto)
      <article class="producto">
        <div class="imagen-producto">
          <img src="/storage/productos/{{$producto->imagen}}" alt="pantalon">
        </div>
        <div class="nombre-mas-precio">
          <div class="nombre"><h4>{{$producto->nombre}}</h4></div>
          <div class="precio"><h4>{{$producto->precio}}</h4></div>
        </div>
        <div class="descripcion"><p>{{$producto->descripcion}}</p></div>
      </article>
    @endforeach
  </section>
</main>
@endsection
