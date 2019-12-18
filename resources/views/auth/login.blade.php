@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/login.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center"><h2>{{ __('Iniciar sesion') }}</h2></div>
          <div class="line"></div>
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
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
                  <label for="password" class="col-form-label text-center text-md-right">{{ __('Contraseña')}}</label>
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
              <div class="form-group row">
                <div class="col-12 text-center">
                  <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __("No tienes una cuenta? Registrate") }}
                  </a>
                </div>
                <div class="col-12 text-center">
                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Olvidaste tu contraseña?') }}
                    </a>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Recuerdame ') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 text-center">
                  <button type="submit" class="boton">
                    {{ __('Iniciar sesion') }}
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
