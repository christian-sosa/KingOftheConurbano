@extends('layouts/Plantilla')

@section('contenido')
<main>
  <form class="" action="/modificar" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="titulo row">
      <h2>Actualizar producto</h2>
    </div>
    <div class="form-group row">
      <label for="nombre" class="col-sm-12 col-form-label">Nombre: {{$producto->nombre}}</label>
      <label for="nombre" class="col-sm-4 col-form-label">Actualizar nombre: </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nuevo nombre" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="precio" class="col-sm-12 col-form-label">Precio: {{$producto->precio}}</label>
      <label for="precio" class="col-sm-4 col-form-label">Actualizar precio: </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="precio" name="precio" placeholder="Nuevo precio" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="descripcion" class="col-sm-12 col-form-label">Descripcion: {{$producto->descripcion}}</label>
      <label for="descripcion" class="col-sm-4 col-form-label">Actualizar descripcion: </label>
      <div class="col-sm-6">
        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Nueva descripcion"></textarea>
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
        <input type="file" class="form-control" id="imagen" name="imagen" value="">
      </div>
    </div>
    <div class="errors">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
        @endforeach
      </ul>
    </div>
    <div class="form-group row">
      <div class="col-6"></div>
      <button class="boton col-4" type="submit" name="button">Actualizar</button>
    </div>
  </main>
@endsection
