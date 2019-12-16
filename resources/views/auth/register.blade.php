@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/registro.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center"><h2>{{ __('Registrate')}}</h2></div>
          <div class="line"></div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row campo-valor">
                <div class="campo col-md-6 text-center">
                  <label for="name" class="col-form-label ">{{ __('Nombre')}}</label>
                </div>
                <div class="valor col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row campo-valor">
                <div class="campo col-md-6 text-center">
                  <label for="email" class="col-form-label text-center text-md-right">{{ __('Direccion Email')}}</label>
                </div>
                <div class="valor col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row campo-valor">
                <div class="campo col-md-6 text-center">
                  <label for="password" class="col-form-label text-center text-md-right">{{ __('Contrasenia')}}</label>
                </div>
                <div class="valor col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              <div class="form-group row campo-valor">
                <div class="campo col-md-6 text-center">
                  <label for="password-confirm" class="col-form-label">{{ __('Confirme la contrasenia')}}</label>
                </div>
                <div class="valor col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>
              </div>
              <div class="form-group row campo-valor">
                <div class="campo col-md-6 text-center">
                  <label for="fecha_nac" class="col-form-label">{{ __('Fecha de nacimiento') }}</label>
                </div>
                <div class="valor col-md-6">
                  <input id="fecha_nac" type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ old('fecha_nac') }}" autocomplete="new-fecha_nac">
                  @error('fecha_nac')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row campo-valor">
                <div class="campo col-md-6 text-center">
                  <label for="telefono" class="col-form-label">{{ __('Numero de telefono') }}</label>
                </div>
                <div class="valor col-md-6">
                  <input id="telefono" type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="---">
                  @error('telefono')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row campo-valor">
                <div class="campo col-md-6 text-center">
                  <label for="avatar" class="col-form-label">{{ __('Avatar') }}</label>
                </div>
                <div class="col-md-6">
                  <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" autocomplete="new-avatar">
                  @error('avatar')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      {{ __('Recuerdame') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 text-center">
                  <button type="submit" class="boton">
                    {{ __('Registrarme') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
