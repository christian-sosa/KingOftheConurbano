@extends('layouts/Plantilla')

@section('css')
<link rel="stylesheet" href="/css/contacto.css">
@endsection

@section('contenido')
<div class="container">
  <main>
    <form action=""  method="post">
      @csrf
      <div class="titulo">
        <h2>Envianos tu consulta</h2>
      </div>
      <div class="form-group row">
        <label class="col-md-4 col-form-label text-center text-md-right" for="email">Email</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="email" name="email" placeholder="Tu email" value="{{old('email')}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-4 col-form-label text-center text-md-right" for="telefono">Telefono</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Tu numero de telefono" value="{{old('telefono')}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-4 col-form-label text-center text-md-right" for="consulta">Consulta</label>
        <div class="col-md-6">
          <textarea class="form-control" name="consulta" id="consulta" rows="2" cols="20" placeholder="Tu consulta" value="{{old('consulta')}}"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-8"></div>
        <button class="boton col-2" type="submit" name="button">Enviar consulta</button>
      </div>
    </form>

    <div class="mapa">
      <div class="titulo">
        <h2>Tambien podes encontrarnos en</h2>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52536.84448321998!2d-58.40134569913184!3d-34.615468677533784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb791570f7236c962!2sDigital%20House!5e0!3m2!1ses!2sar!4v1573614737148!5m2!1ses!2sar" height="450" frameborder="0" allowfullscreen=""></iframe>
    </div>
  </main>
</div>
@endsection
