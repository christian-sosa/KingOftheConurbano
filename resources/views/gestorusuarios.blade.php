@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/gestorusuarios.css">
@endsection

@section('contenido')
  <div class="container">
    <main>
      <form action="/gestor" method="get">
        <button type="submit" class="boton"><i class="fas fa-arrow-left"></i>Volver</button>
      </form>
      <form class="filtrar row" action="" method="get">
        <div class="filtrar-email text-center col-7 row">
          <label class="col-md-6" for="email">Email</label>
          <input type="text" class="form-control col-md-6" name="email" id="email" value="@if(isset($_GET['email'])){{$_GET['email']}}@endif">
        </div>
        <div class="filtrar-botones text-center col-5 row">
          <div class="col-2"></div>
          <button class="boton col-md-4" type="submit">Aplicar filtro</button>
          <a class="col-md-6" href="/gestorusuarios">Limpiar busqueda</a>
        </div>
      </form>
      <section class="usuarios">
        @foreach ($usuarios as $usuario)
          <article class="usuario">
            <div class="card">
              <div class="row">
                <div class="col-md-5">
                  <img src="/storage/{{$usuario->avatar}}" class="card-img-top" alt="avatar">
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <span class="card-text">{{$usuario->name}}</span>
                      </li>
                      <li class="list-group-item">
                        <span class="card-text">{{$usuario->email}}</span>
                      </li>
                      @if($usuario->es_admin)
                        <li class="list-group-item">
                          Es admin
                        </li>
                        <form action="/usuario/quitaradmin" method="post">
                          @csrf
                          <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                          <button type="submit" class="boton">Quitar admin</button>
                        </form>
                      @else
                        <li class="list-group-item">
                          No es admin
                        </li>
                        <form action="/usuario/daradmin" method="post">
                          @csrf
                          <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                          <button type="submit" class="boton">Hacer admin</button>
                        </form>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </article>
        @endforeach
      </section>
    </main>
    {{$usuarios->links()}}
  </div>
@endsection
