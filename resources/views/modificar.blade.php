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
        @csrf
        <input type="hidden" name="id" id="id" value="{{$producto->id}}">
        <div class="info-producto">
          <div class="campo-valor">
            <div class="campo imagen">
              <h4>Imagen actual</h4>
            </div>
            <div class="valor imagen">
              <img src="/storage/{{$producto->imagen}}" alt="Imagen no disponible">
            </div>
            <div class="form-group">
              <label for="imagen" class="col-12 col-form-label">Actualizar Imagen</label>
              <input type="file" class="col-12 form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
              @error('imagen')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="campo-valor">
            <div class="campo">
              <h4>Nombre actual</h4>
            </div>
            <div class="valor">
              <h4>{{$producto->nombre}}</h4>
            </div>
            <div class="form-group">
              <label for="nombre" class="col-6 col-form-label">Actualizar nombre</label>
              <input type="text" class="col-6 form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nuevo nombre" value="{{old('nombre')}}">
              @error('nombre')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="campo-valor">
            <div class="campo">
              <h4>Precio actual</h4>
            </div>
            <div class="valor">
              <h4>{{$producto->precio}}</h4>
            </div>
            <div class="form-group">
              <label for="precio" class="col-6 col-form-label">Actualizar precio</label>
              <input type="text" class="col-6 form-control @error('precio') is-invalid @enderror" id="precio" name="precio" placeholder="Nuevo precio" value="{{old('precio')}}">
              @error('precio')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="campo-valor">
            <div class="campo">
              <h4>Categoria actual</h4>
            </div>
            <div class="valor">
              <h4>{{$producto->categoria->nombre}}</h4>
            </div>
            <div class="form-group">
              <label for="categoria_id" class="col-6 col-form-label">Actualizar categoria</label>
              <select class="col-6 form-control" id="categoria_id" name="categoria_id">
                @foreach($categorias as $categoria) {
                  <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="campo-valor">
            <div class="campo descripcion">
              <h4>Descripcion actual</h4>
            </div>
            <div class="valor descripcion">
              <p>{{$producto->descripcion}}</p>
            </div>
            <div class="form-group">
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
