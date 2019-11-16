@extends('layouts/Plantilla')

@section('muestra')
<main>



  <section class="productos">
    <?php foreach($producto as $producto) { ?>
      <article class="producto">
        <div class="imagen-producto">
          <img src="img/<?=$producto['imagen']?>" alt="pantalon">
        </div>
        <div class="nombre-mas-precio">
          <div class="nombre"><h4><?= $producto['nombre'] ?></h4></div>
          <div class="precio"><h4>$<?=$producto['precio'] ?></h4></div>
        </div>
        <div class="descripcion"><p><?= $producto['descripcion'] ?></p></div>

      </article>
    <?php } ?>
  </section>

</main>
@endsection
