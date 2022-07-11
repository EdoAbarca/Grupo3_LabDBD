<style>
  *{
    margin: 0;
    padding: 0;
  }


  .btn{
    color:white;
    background-color: #313060;
    border-color: #f1f1f1;
  }

  .btn:hover{
    color:#f1f1f1;

  }
  .dropdown-item:hover{
    background-color: #313060;
    color: #f1f1f1;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" style="background-color: #313060">
    <a style="color:#f1f1f1" class="btn" href="/home">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @guest
      <a href="/login" class="btn" role="button">Iniciar Sesión</a>
      <a href="/register" class="btn" role="button">Registrarse</a>
      @endguest
      @auth
      <a href="/profile" class="btn" role="button">Perfil</a>
      <ul class="navbar-nav me-auto mb-3 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color:#f1f1f1" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#f1f1f1; border-color:#313060">
            <!--<li><a class="dropdown-item" href="/upload_song">Subir canción</a></li>-->
            @if(auth()->user()->role_id == 3)
            <li><a class="dropdown-item" href="/checkout">Pagar suscripción</a></li>
            @endif
            @if(auth()->user()->role_id == 2)
            <li><a class="dropdown-item" href="/create_album">Crear álbum</a></li>
            @endif
            @if(auth()->user()->role_id == 1)
            <li><a class="dropdown-item" href="/crud">Administración de plataforma</a></li>
            @endif
          </ul>
        </li>
      </ul>
      <hc>
        @if(auth()->user()->role_id == 1)
        <label style="color:#f1f1f1">Administrador</label>
        @endif
        @if(auth()->user()->role_id == 2)
        <label style="color:#f1f1f1">Artista</label>
        @endif
        @if(auth()->user()->role_id == 3)
        <label style="color:#f1f1f1">Usuario</label>

        @endif
        <label for="validationDefault02" class="form-label" style="color:#f1f1f1">: {{auth()->user()->nickname}} </label>
        <form style="display: inline" action="/logout" method="POST">
          <a href="#" style="color:#f1f1f1" class="btn" onclick="this.closest('form').submit()">Cerrar Sesión</a>
        </form>
        @endauth
    </div>
  </div>
</nav>