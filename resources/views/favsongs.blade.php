<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Favorite logged user songs</title>

  <!-- <link href="{{ asset('css/favsongs.css') }}" rel="stylesheet"> -->
</head>

<style>
  .grid {
    justify-content: stretch;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1em;
    grid-template-rows: 70px 150px 270px;
    padding-left: 2em;
    padding-right: 2em;

  }


  body {
    background-color: #f1f1f1;
    font-family: "Century Gothic";

  }

  #main-container {
    margin: 150px auto;
    width: 1000px;
  }

  table {
    background-color: white;
    text-align: left;
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    /*border: solid 1px black;*/
    padding: 20;
  }

  thead {
    background-color: #313060;
    border-bottom: slid 5pc #0f362d;
    color: white;
  }

  tr:nth-child(even) {
    background-color: #ddd;
  }
</style>

<!-- Aquí irá la muestra de las canciones favoritas del usuario logueado -->
@include('includes.navbar')

<body style="margin-bottom:22px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="display-3">Tus favoritos</h1>
        <!-- 
        <div>
          <a href="#" class="btn btn-primary mb-3">Agregar canción</a>
        </div>
        -->
        <div class="alert alert-success">

        </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <td>ID</td>
              <td>Canción</td>
              <td>Duración</td>
              <td colspan=2>Acciones</td>
            </tr>
          </thead>
          <tbody>
            @foreach($likes as $l)
            @if($l->user_id == auth()->user()->id)
            @foreach($songs as $s)
            @if($l->song_id == $s->id)
            <tr>
              <td>{{$l->id}}</td>
              <td>{{$s->song_name}}</td>
              <td>{{$s->duration}}</td>
              <td>
                <form action="favsongs/{{$l->id}}" method="POST">
                  @csrf
                  @method('PUT')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
              </td>
                            <td>
                  <form method="GET" action="/playing_song/{{$s->id}}">
                    <button type="submit" class="btn">Reproducir Cancion</button>
                  </form>
                </td>
            </tr>
            @endif
            @endforeach
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>