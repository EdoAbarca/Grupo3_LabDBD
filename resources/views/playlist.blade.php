<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Playlist</title>

  <!-- <link href="{{ asset('css/playlist.css') }}" rel="stylesheet"> -->
</head>

<body style="margin-bottom:22px">
<style>
.button {
  border: 0;
  background: transparent;
  box-sizing: border-box;
  width: 0;
  height: 74px;

  border-color: transparent transparent transparent #202020;
  transition: 100ms all ease;
  cursor: pointer;


  border-style: solid;
  border-width: 37px 0 37px 60px;
}
</style>

  @include('includes.navbar')
  <!-- Aquí irá la vista a una lista de reproducción genérica -->
  <section class="col-sm-4 no-padder bg">
    <section class="vbox">
      <section class="scrollable hover">
        <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
          <li class="list-group-item clearfix">
            <a class="jp-play-me pull-right m-t-sm m-l text-md">
              <i class="icon-control-play text"></i> <i class="icon-control-pause text-active"></i><!-- -->
            </a>
            <a  class="pull-left thumb-sm m-r"> 
            </a>
              <span class="block text-ellipsis">Nombre cancion</span>
              <small class="text-muted">Autor cancion</small>
              <button class='button'></button>
            </a>
          </li>
        </ul>
      </section>
    </section>
  </section>
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>