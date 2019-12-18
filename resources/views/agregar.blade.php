@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/agregarproducto.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form action="/gestorproductos" method="get">
      <button type="submit" class="boton"><i class="fas fa-arrow-left"></i>Volver</button>
    </form>
    <form method="POST" action="/agregar" enctype="multipart/form-data" class="row">
      @csrf
      <div class="titulo row col-12">
        <h2 class="text-center col-12">Agregar producto</h2>
      </div>
      <div class="line"></div>
      <div class="form-group row col-12">
        <label for="imagen" class="col-12 col-md-6 col-form-label text-center">Imagen</label>
        <input type="file" class="col-12 col-md-4 form-control text-center @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
        @error('imagen')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group row col-12">
        <label for="nombre" class="col-12 col-md-6 col-form-label text-center">Nombre</label>
        <input type="text" class="col-12 col-md-4 form-control text-center @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nuevo nombre" value="{{old('nombre')}}">
        @error('nombre')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group row col-12">
        <label for="precio" class="col-12 col-md-6 col-form-label text-center">Precio</label>
        <input type="text" class="col-12 col-md-4 text-center form-control @error('precio') is-invalid @enderror" id="precio" name="precio" placeholder="Nuevo precio" value="{{old('precio')}}">
        @error('precio')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group row col-12">
        <label for="categoria_id" class="col-12 col-md-6 col-form-label text-center">Categoria</label>
        <select class="col-12 col-md-4 form-control text-center" id="categoria_id" name="categoria_id">
          @foreach($categorias as $categoria) {
            <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group row col-12">
        <label for="descripcion" class="col-12 col-md-6 col-form-label text-center">Descripcion</label>
        <textarea class="col-12 col-md-4 form-control text-center @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Nueva descripcion" value="{{old('descripcion')}}"></textarea>
        @error('descripcion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group row col-12">
        <div class="col-8"></div>
        <button class="boton col-2" type="submit" name="button"><i class="fas fa-plus"></i>Agregar</button>
      </div>
    </form>
  </main>
</div>
@endsection
