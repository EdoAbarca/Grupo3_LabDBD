<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Profile</title>

  <!-- <link href="{{ asset('css/profile.css') }}" rel="stylesheet"> -->
</head>

<body style="margin-bottom:22px">


  @include('includes.navbar')
  <!-- Aquí irá la vista al perfil del usuario logueado -->
  <aside class="aside-lg bg-light lter b-r">
    <section class="vbox">
      <section class="scrollable">
        <div class="wrapper">
          <div class="text-center m-b m-t">
            <a href="#" class="thumb-lg">
              <img class="img-circle">
              <!--src="profile.png" -->
            </a>
            <div>
              <div class="h3 m-t-xs m-b-xs"> Nombre usuario </div>
              <small class="text-muted">
                <i class="fa fa-map-marker"></i> Ubicacion usuario
              </small>
            </div>
          </div>
          <div class="panel wrapper">
            <div class="row text-center">
              <div class="col-xs-6">
                <a href="#">
                  <span class="m-b-xs h4 block">245</span>
                  <small class="text-muted">Seguidores</small>
                </a>
              </div>
              <div class="col-xs-6">
                <a href="#">
                  <span class="m-b-xs h4 block">55</span>
                  <small class="text-muted">Siguiendo</small>
                </a>
              </div>
            </div>
          </div>
          <div class="btn-group btn-group-justified m-b">
            <a class="btn btn-success btn-rounded" data-toggle="button"><!-- Boton para follow, adaptar para crear y borrar seguimiento -->
              <span class="text">
                <i class="fa fa-eye"></i> Seguir
              </span>
              <span class="text-active">
                <i class="fa fa-eye"></i> Siguiendo
              </span>
            </a>
            <a class="btn btn-dark btn-rounded">
              <i class="fa fa-comment-o"></i> Canciones
            </a>
          </div>
          <div>
            <small class="text-uc text-xs text-muted">Rol</small>
            <p>Artist</p> 
            <small class="text-uc text-xs text-muted">Descripción</small>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin
              venenatis ipsum ac feugiat.</p>
            <div class="line"></div>
          </div>
        </div>
      </section>
    </section>
  </aside>

  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>