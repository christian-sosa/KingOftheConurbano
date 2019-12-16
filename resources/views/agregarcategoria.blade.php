@extends('layouts/Plantilla')


@section('contenido')

  <main>
    <form action="/gestorcategorias" method="get">
      <button type="submit" class="boton"><i class="fas fa-arrow-left"></i>Volver</button>
    </form>
    <form class="" action="/agregarcategoria" method="post" enctype="multipart/form-data">
      @csrf
      <div class="titulo row">
        <h2>Agregar categoria</h2>
      </div>
      <div class="form-group row">
        <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
        <div class="col-sm-6">
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
@endsection
