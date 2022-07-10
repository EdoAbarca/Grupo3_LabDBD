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
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="display-3">Lista de reproducción</h1>
        <hr>
        <h6 class="display-3">{{$playlist->playlist_name}}</h6>
        <h6 class="display-3">Fecha de creación: {{$playlist->creation_date}}</h6>
        <h6 class="display-3">Descripción: {{$playlist->description}}</h6>

        <div class="alert alert-success">

        </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <td>ID</td>
              <td>Canción</td>
              <td colspan=2>Acciones</td>
            </tr>
          </thead>
          <tbody>
            @foreach($song_playlists as $sp)
            @foreach($songs as $s)
            @if($sp->song_id == $s->id && $sp->playlist_id == $playlist->id)
            <tr>
              <td>{{$s->id}}</td>
              <td>{{$s->song_name}}</td>
              <td>
                <a href="" class="btn btn-primary">Reproducir</a>
              </td>
              <td>
                <form action="song_playlists/{{$sp->id}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div>
                    <input class="invisible" id="playlist_id" name=playlist_id value="{{$playlist->id}}">
                  </div>
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
              </td>
            </tr>
            @endif
            @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
      <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    </div>
  </div>
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>