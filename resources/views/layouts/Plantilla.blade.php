<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>King of the Conurbano</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css"  href="css/general.css">

</head>
<body>
  <header>
    <nav>
      <ul>

        <div class="link-nav titulo">
          <li>King of the Conurbano</li>
        </div>

        <div class="link-nav">
          <li><a href="/home">Home</a></li>
        </div>

        <div class="link-nav">
          <li><a href="/faq">F.A.Q.</a></li>
        </div>

        <div class="link-nav">
          <li><a href="/contacto">Contacto</a></li>
        </div>





      </ul>
    </nav>
  </header>

  @yield('contenido')

  <footer>
    <nav>
      <ul>
        <div class="links">
          <li><a href="/home">Home</a></li>
          <li><a href="/faq">F.A.Q.</a></li>
          <li><a href="/contacto">Contacto</a></li>
        </div>
        <div class="redes">
          <li><i class="fab fa-twitter-square"></i><a href="https://www.twitter.com">@kingoftheconurbano</a></li>
          <li><i class="fab fa-instagram"></i><a href="https://www.instagram.com">King of the Conurbano</a></li>
          <li><i class="fab fa-facebook-square"></i><a href="https://www.facebook.com">King of the Conurbano</a></li>
        </div>
      </ul>
    </nav>
  </footer>
</body>
</html>
