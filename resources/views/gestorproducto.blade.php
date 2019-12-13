@extends('layouts/Plantilla')

@section('contenido')
<main>

  <button type="button" class="boton"><a href="/gestor"><i class="fas fa-arrow-left"></i>Volver</a></button>
  <button class="boton" type="submit" name="button"><a href="/agregar"><i class="fas fa-plus"></i>AgregarProducto</a></button>

  <section class="productos">
    @foreach ($productos as $producto)
    <article class="producto">
      <div class="imagen-producto">
        <img src="/storage/{{$producto->imagen}}" alt="">
      </div>
      <div class="nombre-mas-precio">
        <div class="nombre"><h4>{{$producto->nombre}}</h4></div>
        <div class="precio"><h4>{{$producto->precio}}</h4></div>
      </div>
      <div class="descripcion"><p>{{$producto->descripcion}}</p></div>
      <div class="botones">
        <button type="button modificar-producto" class="boton col-4" name="button"><a href="/modificar/{{$producto->id}}"><i class="fas fa-tools"></i>Modificar publicacion</a></button>
        <button type="button eliminar-producto" class="boton col-4"  name="button"><a href="/eliminar/{{$producto->id}}"><i class="fas fa-times"></i>Quitar del catalogo</a></button>
      </div>
    </article>
    @endforeach
  </section>

  <button type="button" class="boton"><a href="/home"><i class="fas fa-arrow-left"></i>Volver</a></button>

</main>
@endsection
