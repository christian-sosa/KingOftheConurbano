@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/perfil.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <div class="card profile" id="profile-card">
      <li class="list-group-item">
        <span class="card-text"><b>Tu perfil</b></span>
      </li>
      <div id="profile-imgContainer">
        <img src="/storage/{{$user->avatar}}" id="profile-img" class="card-img-top" alt="avatar">
      </div>
      <ul class="list-group list-group-flush">
        <div id="profile-name">
          <li class="list-group-item">
            <span class="card-text">{{$user->name}}</span>
          </li>
        </div>
        <div id="profile-email">
          <li class="list-group-item">
            <span class="card-text">{{$user->email}}</span>
          </li>
        </div>
        <div id="profile-date">
          <li class="list-group-item"><span class="card-text">
            {{$user->fecha_nac}}</span>
          </li>
        </div>
        <div id="profile-phone">
          <li class="list-group-item">
            <span class="card-text">{{$user->telefono}}</span>
          </li>
        </div>
        <div id="profile-button">
          <li class="list-group-item">
            <button type="button" name="button" id="slide">Modificar datos del perfil</button>
          </li>
        </div>
      </ul>
    </div>

    <div class="card modify" id="form-card">
      <li class="list-group-item">
        <span class="card-text"><b>Cambios</b></span>
      </li>
      <form action="/perfil" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="form-imgContainer">
          <label for="avatar"><img src="/storage/default.jpg" id="form-img" alt=""></label>
          <input type="file" name="avatar" id="avatar" style="display:none;">
        </div>
        <ul class="list-group list-group-flush">

          <div id="form-name">
            <li class="list-group-item">
              <label for="name">Nombre:</label>
              <input type="text" name="name" id="name" value="{{ old('name') }}">
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </li>
          </div>

          <div id="form-email">
            <li class="list-group-item">
              <label for="email">Email:</label>
              <input type="text" name="email" id="email" value="{{ old('email') }}">
            </li>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div id="form-date">
            <li class="list-group-item">
              <label for="fecha_nac">Fecha de nacimiento:</label>
              <input type="date" name="fecha_nac" id="fecha_nac" value="{{ old('fecha_nac') }}">
            </li>
            @error('fecha_nac')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div id="form-phone">
            <li class="list-group-item">
              <label for="telefono">Telefono:</label>
              <input type="tel" name="telefono" id="telefono" value="{{ old('telefono') }}">
            </li>
            @error('telefono')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div id="form-button">
            <li class="list-group-item">
              <button type="submit" name="button">Aplicar cambios</button>
            </li>
          </div>
        </ul>
      </form>
    </div>
  </main>
</div>
@endsection

@section('script')
<script src='/js/perfil.js'></script>
@endsection
