@extends('layouts/Plantilla')

@section('agregar')
<main>
  <form class="" action="/muestra" method="post" enctype="multipart/form-data">
   {{csrf_field()}}
    <div class="titulo row">
      <h2>Agregar producto</h2>
    </div>
    <div class="form-group row">
      <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="precio">Precio</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="precio" name="precio" value="<?=(isset($_POST["precio"]))?$_POST["precio"]:"";?>">
      </div>

    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="descripcion">Descripcion</label>
      <div class="col-sm-6">
        <textarea class="form-control" name="descripcion" id="descripcion" rows="2" cols="20"><?=(isset($_POST['descripcion']))?$_POST['descripcion']:""?></textarea>
      </div>

    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="categoria">Categoria</label>
      <div class="col-sm-6">
        <select class="form-control" name="categoria" id="categoria">
          <?php foreach($categoria as $categoria) { ?>
            <option value="<?=$categoria['nombre']?>"><?=$categoria['nombre']?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="imagen">Imagen</label>
      <div class="col-sm-6">
        <input type="file" class="form-control" id="imagen" name="imagen" value="">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-8"></div>
      <button class="boton col-2" type="submit" name="button"><i class="fas fa-plus"></i>Agregar</button>
    </div>
  </form>
</main>
@endsection
