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
    <form class="filtrar row" action="" method="get">
      <div class="filtrar-nombre text-center col-4 row">
        <label class="col-md-6" for="nombre">Nombre</label>
        <input type="text" class="form-control col-md-6" name="nombre" value="@if(isset($_GET['nombre'])){{$_GET['nombre']}}@endif">
      </div>
      <div class="filtrar-categoria text-center col-4 row">
        <label class="col-md-6" for="title">Categoria</label>
        <select class="form-control col-md-6" name="categoria_id">
          <option value="">---N/A---</option>
          @foreach ($categorias as $categoria)
            <option value="{{ $categoria['id']}}"
            @if(isset($_GET['categoria_id']) && $_GET['categoria_id'] == $categoria['id']) selected @endif>
              {{$categoria['nombre']}}
            </option>
          @endforeach
        </select>
      </div>
      <div class="filtrar-botones text-center col-4 row">
        <div class="col-md-2"></div>
        <button class="boton col-md-4" type="submit">Aplicar filtro</button>
        <a class="col-md-4" href="/gestorproductos">Limpiar busqueda</a>
      </div>
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
            <form class="col-6" action="/modificar/{{$producto->id}}" method="get">
              <button type="submit" class="col-12 boton" name="button"><i class="fas fa-tools"></i>Modificar producto</button>
            </form>
            <form class="col-6" action="/eliminar" method="post">
              @csrf
              <input type="hidden" name="producto_id" value="{{$producto->id}}">
              <button type="submit" class="col-12 boton" name="button"><i class="fas fa-times"></i>Quitar del catalogo</button>
            </form>
          </div>
        </article>
      @endforeach
    </section>
  </main>
</div>
@endsection
