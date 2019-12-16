<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>King of the Conurbano</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css"  href="/css/general.css">
    @yield('css')

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

          @if (Auth::user())
          <div class="link-nav">
            <li><a href="/perfil">Perfil</a></li>
          </div>
          @if (Auth::user()->es_admin)
            <div class="link-nav">
              <li><a href="/gestor">Gestor</a></li>
            </div>
          @endif

          <div class="link-nav">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
              <i class="fas fa-sign-out-alt"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>

          @else
          <div class="link-nav">
            <li><a href="{{ route('login') }}">Login</a></li>
          </div>
          <div class="link-nav">
            <li><a href="{{ route('register') }}">Register</a></li>
          </div>
          @endif




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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('script')
  </body>
</html>
