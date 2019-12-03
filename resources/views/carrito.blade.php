@extends('layouts/Plantilla')



@section('contenido')
<main>

      <button type="button" class="boton"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></button>

      <h4>En mi carro actualmente: </h4>

    @if($productos)
        @foreach($producto as $producto)
          <article class="producto">
            <div class="imagen-producto">
              <img src="img/<{{$producto['imagen']}}" alt="pantalon">
            </div>
            <div class="nombre-mas-precio">
              <div class="nombre"><h4>< {{$producto['nombre']}} </h4></div>
              <div class="precio"><h4>${{$producto['precio']}} </h4></div>
            </div>
            <div class="descripcion"><p>< {{$producto['descripcion']}} </p></div>
            <div class="botones">
              <div class="boton"><a href="eliminar-del-carrito.php?producto_id=<?=$producto['id']?>"><i class="fas fa-times"></i>Quitar del carrito</a></div>
            </div>
          </article>
          @endforeach
    @endif
       @else
        echo 'No posee productos en su carro actualmente';
      @endelse

      <div class="precio-total row">
        <div class="texto col-6">
          <h2>Total</h2>
        </div>
        <div class="precio-final col-6">
          <h2> $<?=$total?> </h2>
        </div>
      </div>

      <?php if($productos){ ?>
        <div class="vaciar-carro">
          <button class="boton" type="submit" name="button"><a href="vaciar-carro.php">Vaciar carrito</a></button>
        </div>
      <?php } ?>

    </main>
@endsection
