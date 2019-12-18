@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/agregarcategoria.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form action="/gestorcategorias" method="get">
      <button type="submit" class="boton"><i class="fas fa-arrow-left"></i>Volver</button>
    </form>
    <form id="agregar" action="/agregarcategoria" method="post" enctype="multipart/form-data">
      @csrf
      <div class="titulo">
        <h2>Agregar categoria</h2>
      </div>
      <div class="form-group row">
        <label for="nombre" class="col-md-4 col-form-label text-center  text-md-right">Nombre de la categoria</label>
        <div class="col-md-6">
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{old('nombre')}}">
          @error('nombre')
            {{$message}}
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="col-8"></div>
        <button class="boton col-2" type="submit" name="button"><i class="fas fa-plus"></i>Agregar</button>
      </div>
    </form>
  </main>
</div>
@endsection
