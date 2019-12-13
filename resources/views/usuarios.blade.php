@extends('layouts/Plantilla')

@section('css')
  <link rel="stylesheet" href="/css/home.css">
@endsection

@section('contenido')
  <div class="container">
    <main>
      <button type="button" class="boton"><a href="/gestor"><i class="fas fa-arrow-left"></i>Volver</a></button>
      <section class="usuarios">
        @foreach ($usuarios as $usuario)
          <article class="usuario">
            <div class="imagen-usuario">
              <img src="/storage/{{$usuario->avatar}}">
            </div>
            <div class="nombre-mas-precio">
              <div class="nombre"><h4>{{$usuario->name}}</h4></div>
              <div class="precio"><h4>{{$usuario->email}}</h4></div>
              <div class="precio"><h4>{{$usuario->fecha_nac}}</h4></div>
            </div>
            <div class="descripcion"><p>{{$usuario->telefono}}</p></div>
            @if($usuario->es_admin == 1)
              <div class="descripcion"><p>Es admin</p></div>
            @else
              <div class="descripcion"><p>No es admin</p></div>
            @endif
            <div class="botones">
              <button class="boton ver-mas"><a href="/usuario/{{$usuario->id}}">Ver en detalle</a></button>
              @if($usuario->es_admin ==0)
                <button class="boton aniadir-al-carro"><a href="/usuario/esadmin/{{$usuario->id}}"><i class="fas fa-cart-plus"></i> Dar admin</a></button>
              @else
                <button class="boton aniadir-al-carro"><a href="/usuario/noesadmin/{{$usuario->id}}"><i class="fas fa-cart-plus"></i> quitar admin</a></button>

              @endif
            </div>
          </article>
        @endforeach
      </section>
    </main>
    {{$usuarios->links()}}
  </div>
@endsection
