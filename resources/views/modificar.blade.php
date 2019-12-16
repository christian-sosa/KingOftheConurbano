@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/modificar.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form class="" action="/gestorproductos" method="get">
      <button type="submit" class="boton">Volver</button>
    </form>
    <div class="producto">
      <form class="" action="/modificar" method="post" enctype="multipart/form-data">
      <div class=" text-center"><h2>{{ __('Actualizar producto') }}</h2></div>
        @csrf
        <input type="hidden" name="id" id="id" value="{{$producto->id}}">
        <div class="info-producto">

          <div class="row campo-valor">
            <div class="campo col-12">
              <h4>Imagen actual</h4>
              <img src="/storage/{{$producto->imagen}}" alt="Imagen no disponible">
            </div>
            <div class="form-group row">
              <label for="imagen" class="col-12 col-form-label text-center">Actualizar imagen</label>
              <input type="file" class="col-12 form-control text-center @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
              @error('imagen')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="row campo-valor">
            <div class="campo col-12">
              <h4>Nombre actual</h4>
            </div>
            <div class="valor col-12">
              <h4>{{$producto->nombre}}</h4>
            </div>
            <div class="form-group row">
              <label for="nombre" class="col-12 col-form-label">Actualizar nombre</label>
              <input type="text" class="col-12 form-control text-center @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nuevo nombre" value="{{old('nombre')}}">
              @error('nombre')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="row campo-valor">
            <div class="campo col-12">
              <h4>Precio actual</h4>
            </div>
            <div class="valor col-12">
              <h4>${{$producto->precio}}</h4>
            </div>
            <div class="form-group row">
              <label for="precio" class="col-12 col-form-label">Actualizar precio</label>
              <input type="text" class="col-12 text-center form-control @error('precio') is-invalid @enderror" id="precio" name="precio" placeholder="Nuevo precio" value="{{old('precio')}}">
              @error('precio')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="row campo-valor">
            <div class="campo col-12">
              <h4>Categoria actual</h4>
            </div>
            <div class="valor col-12">
              <h4>{{$producto->categoria->nombre}}</h4>
            </div>
            <div class="form-group row">
              <label for="categoria_id" class="col-12 col-form-label">Actualizar categoria</label>
              <select class="col-12 form-control text-center" id="categoria_id" name="categoria_id">
                @foreach($categorias as $categoria) {
                  <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row campo-valor">
            <div class="campo col-12">
              <h4>Descripcion actual</h4>
            </div>
            <div class="valor col-12">
              <p>{{$producto->descripcion}}</p>
            </div>
            <div class="form-group row">
              <label for="descripcion" class="col-12 col-form-label">Actualizar descripcion</label>
              <textarea class="col-12 form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Nueva descripcion" value="{{old('descripcion')}}"></textarea>
              @error('descripcion')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <button class="boton col-12" type="submit" name="button">Actualizar</button>
        </div>
      </form>
    </div>
  </main>
</div>
@endsection
