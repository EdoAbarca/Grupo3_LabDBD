<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @auth
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <!-- <a class="nav-link dropdown-toggle" href="/suscription" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> ¿Suscripcion? </a>-->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/favorites">Canciones favoritas</a></li>
            <li><a class="dropdown-item" href="/playlists">Listas de reproducción</a></li>
          </ul>
        </li>
      </ul>
      @endauth
      @guest
      <a href="/login" class="btn btn-outline-success" role="button">Iniciar Sesión</a>
      <a href="/register" class="btn btn-outline-success" role="button">Registrarse</a>
      @endguest
      @auth
      <label for="validationDefault02" class="form-label">$ {{auth()->user()->username}} </label>
      <!-- <a href="/profile" class="btn btn-outline-success" role="button">Perfil</a>-->
      <form style="display: inline" action="/logout" method="POST">
        <a href="#" class="btn btn-outline-success" onclick="this.closest('form').submit()">Cerrar Sesión</a>
      </form>
      @endauth
    </div>
  </div>
</nav>