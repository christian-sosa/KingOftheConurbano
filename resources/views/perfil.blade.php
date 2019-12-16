@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/perfil.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <div class="card profile" id="profile-card">
      <li class="list-group-item campo-valor">
        <h2 class="card-text"><b>Tu perfil</b></h2>
      </li>
      <ul class="list-group list-group-flush">
        <div id="profile-imgContainer">
          <li class="list-group-item campo-valor">
            <div class="campo">
              <h4>Foto de perfil/Avatar</h4>
            </div>
            <div class="valor">
              <img src="/storage/{{$user->avatar}}" id="profile-img" class="card-img-top" alt="Imagen no disponible">
            </div>
          </li>
        </div>
        <div id="profile-name">
          <li class="list-group-item campo-valor">
            <div class="campo">
              <h4>Nombre</h4>
            </div>
            <div class="valor">
              <h4 class="card-text">{{$user->name}}</h4>
            </div>
          </li>
        </div>
        <div id="profile-email">
          <li class="list-group-item campo-valor">
            <div class="campo">
              <h4>Email</h4>
            </div>
            <div class="valor">
              <h4 class="card-text">{{$user->email}}</h4>
            </div>
          </li>
        </div>
        <div id="profile-date">
          <li class="list-group-item campo-valor">
            <div class="campo">
              <h4>Fecha de nacimiento</h4>
            </div>
            <div class="valor">
              <h4 class="card-text">{{$user->fecha_nac}}</h4>
            </div>
        </div>
        <div id="profile-phone">
          <li class="list-group-item campo-valor">
            <div class="campo">
              <h4>Telefono</h4>
            </div>
            <div class="valor">
              <h4 class="card-text">@if($user->telefono){{$user->telefono}}@else{{'Sin asignar'}}@endif</h4>
            </div>
          </li>
        </div>
        <div id="profile-button">
          <li class="list-group-item campo-valor">
            <button type="button" class="boton" name="button" id="slide">Modificar datos del perfil</button>
          </li>
        </div>
      </ul>
    </div>
    <!-- style="@if($errors->isEmpty()) {{'display:none;'}} @else {{'display:block;'}} @endif" -->
    <div class="card modify" id="form-card" style="@if($errors->isEmpty()) {{'display:none;'}} @else {{'display:block;'}} @endif">
      <li class="list-group-item campo-valor">
        <h2 class="card-text"><b>Cambios</b></h2>
      </li>
      <form action="/perfil" method="POST" enctype="multipart/form-data">
        @csrf
        <ul class="list-group list-group-flush">
          <div id="form-imgContainer">
            <div class="list-group-item campo-valor">
              <div class="campo">
                <label for="avatar">Nueva foto de perfil/Avatar</label>
              </div>
              <div class="valor">
                <label for="avatar"><img src="/storage/default.png" id="form-img" alt=""></label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="avatar" style="display:none;">
              </div>
            </div>
          </div>
          <div id="form-name">
            <div class="list-group-item campo-valor">
              <div class="campo">
                <label for="name">Nuevo nombre</label>
              </div>
              <div class="valor">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          <div id="form-email">
            <div class="list-group-item campo-valor">
              <div class="campo">
                <label for="email">Nuevo email</label>
              </div>
              <div class="valor">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>
          </div>
          <div id="form-date">
            <div class="list-group-item campo-valor">
              <div class="campo">
                <label for="fecha_nac">Nueva fecha de nacimiento</label>
              </div>
              <div class="valor">
                <input type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" id="fecha_nac" value="{{ old('fecha_nac') }}">
                  @error('fecha_nac')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>
          </div>
          <div id="form-phone">
            <div class="list-group-item campo-valor">
              <div class="campo">
                <label for="telefono">Nuevo telefono</label>
              </div>
              <div class="valor">
                <input type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{ old('telefono') }}">
                  @error('telefono')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>
          </div>
          <div id="form-button">
            <li class="list-group-item campo-valor">
              <button type="button" class="boton" name="button" id="send-button">Aplicar cambios</button>
            </li>
          </div>
        </ul>
      </form>
    </div>
  </main>
</div>
@endsection

@section('script')
<script src="/js/perfil.js"></script>
@endsection
