@extends('layouts/Plantilla')

@section('contenido')
  <div class="container">
    <main>
      <button type="button" class="boton"><a href="/gestor"><i class="fas fa-arrow-left"></i>Volver</a></button>
      <button type="button" class="boton"><a href="/agregarcategoria"><i class="fas fa-arrow-left"></i>Agregar categoria</a></button>
      <section class="categorias">
        @foreach ($categorias as $categoria)
          <article class="categoria">
            <div class="nombre-mas-precio">
              <div class="nombre"><h4>{{$categoria->nombre}}</h4></div>
            </div>
            <div class="botones">
              <button type="button eliminar-producto" class="boton col-4"  name="button"><a href="/eliminarcategoria/{{$categoria->id}}"><i class="fas fa-times"></i>Quitar categoria</a></button>
            </div>
          </article>
        @endforeach
      </section>
    </main>
    {{$categorias->links()}}
  </div>
  @endsection
