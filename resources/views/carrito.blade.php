@extends('layouts/Plantilla')



@section('contenido')
<main>

  <form class="" action="/home" method="get">
    <button type="submit" class="boton">Volver</button>
  </form>



    @if(sizeof($productos))
        <h4>En mi carro actualmente: </h4>
        @foreach($productos as $producto)
          <article class="producto">
            <div class="imagen-producto">
              <img src="/storage/{{$producto->imagen}}">
            </div>
            <div class="nombre-mas-precio">
              <div class="nombre"><h4>{{$producto->nombre}}</h4></div>
              <div class="precio"><h4>{{$producto->precio}}</h4></div>
            </div>
            <div class="descripcion"><p>{{$producto->descripcion}}</p></div>
            <div class="botones">
              <form class="" action="/carrito/quitarproducto" method="post">
                @csrf
                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                <button type="submit" class="boton"><i class="fas fa-times"></i>Quitar del carrito</button>
              </form>
            </div>
          </article>
          @endforeach
       @else
         <h4>No posee productos en su carro actualmente.</h4>
      @endif

      <div class="precio-total row">
        <div class="texto col-6">
          <h2>Total</h2>
        </div>
        <div class="precio-final col-6">

        </div>
      </div>

      @if(sizeof($productos))
        <div class="vaciar-carro">
          <form class="" action="/carrito/vaciar" method="post">
            @csrf
            <button class="boton" type="submit" name="button">Vaciar carrito</button>
          </form>
        </div>
      @endif

    </main>
@endsection
