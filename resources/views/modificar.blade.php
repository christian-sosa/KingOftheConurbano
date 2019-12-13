@extends('layouts/Plantilla')

@section('contenido')
<main>
  <form class="" action="/modificar" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
    <input type="hidden" name="id" id="id" value="{{$producto->id}}">
    <div class="titulo row">
      <h2>Actualizar producto</h2>
    </div>
    <div class="form-group row">
      <label for="nombre" class="col-sm-12 col-form-label">Nombre: {{$producto->nombre}}</label>
      <label for="nombre" class="col-sm-4 col-form-label">Actualizar nombre: </label>
      <div class="col-sm-6">
        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nuevo nombre" value="{{old('nombre')}}">
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="precio" class="col-sm-12 col-form-label">Precio: {{$producto->precio}}</label>
      <label for="precio" class="col-sm-4 col-form-label">Actualizar precio: </label>
      <div class="col-sm-6">
        <input type="text" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" placeholder="Nuevo precio" value="{{old('precio')}}">
        @error('precio')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="descripcion" class="col-sm-12 col-form-label">Descripcion: {{$producto->descripcion}}</label>
      <label for="descripcion" class="col-sm-4 col-form-label">Actualizar descripcion: </label>
      <div class="col-sm-6">
        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Nueva descripcion" value="{{old('descripcion')}}"></textarea>
        @error('descripcion')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="categoria">Categoria: {{$producto->categoria->nombre}}</label>
      <label class="col-sm-4 col-form-label" for="categoria">Categoria nueva:</label>
      <div class="col-sm-6">
        <select class="form-control" name="categoria_id" id="categoria_id">
          @foreach($categorias as $categoria) {
            <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="imagen">Imagen:</label>
      <div class="c-img col-sm-12">
        <img id="imagen-producto" src="/storage/{{$producto->imagen}}" alt="">
      </div>
      <label class="col-sm-4 col-form-label" for="imagen">Imagen nueva:</label>
      <div class="col-sm-6 input-imagen">
        <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" value="">
        @error('imagen')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-6"></div>
      <button class="boton col-4" type="submit" name="button">Actualizar</button>
    </div>
  </main>
@endsection
