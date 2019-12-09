<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h4>Nombre: {{$user->name}}</h4>
    <h4>Email: {{$user->email}}</h4>
    <h4>Fecha de nacimiento: {{$user->fecha_nac}}</h4>
    <h4>Telefono: {{$user->telefono}}</h4>
    <img src="/storage/{{$user->avatar}}" alt="">
  </body>
</html>
