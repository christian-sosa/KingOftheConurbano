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
          <article class="usuario col-12 col-sm-6 col-lg-4">
            <div class="card">

                <img src="/storage/{{$usuario->avatar}}" class="card-img-top" alt="avatar">
                <div class="card-body">
                  <h4 class="card-text">Nombre: {{$usuario->name}}</h4>
                  <h4 class="card-text">Email: {{$usuario->email}}</h4>
                  @if($usuario->es_admin)
                    <p class="card-text"><strong style="color: green;">Es admin</strong></p>
                    <form action="/usuario/quitaradmin" class="text-center" method="post">
                      @csrf
                      <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                      <button type="submit" class="boton">Quitar admin</button>
                    </form>
                  @else
                    <p class="card-text"><strong style="color: red;">No es admin</strong></p>
                    <form action="/usuario/daradmin" class="text-center" method="post">
                      @csrf
                      <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                      <button type="submit" class="boton">Hacer admin</button>
                    </form>
                  @endif
                  </ul>
                </div>

            </div>
          </article>
        @endforeach
      </section>
    </main>
    {{$usuarios->links()}}
  </div>
@endsection
