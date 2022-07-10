<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>User playlists</title>

  <!-- <link href="{{ asset('css/playlists_user.css') }}" rel="stylesheet"> -->
</head>

<body style="margin-bottom:22px">
  <style>
    .table-fixed tbody {
      height: 300px;
      overflow-y: auto;
      width: 100%;
    }

    .table-fixed thead,
    .table-fixed tbody,
    .table-fixed tr,
    .table-fixed td,
    .table-fixed th {
      display: block;
    }

    .table-fixed tbody td,
    .table-fixed tbody th,
    .table-fixed thead>tr>th {
      float: left;
      position: relative;

      &::after {
        content: '';
        clear: both;
        display: block;
      }
    }


    body {
      background: #74ebd5;
      background: -webkit-linear-gradient(to right, #74ebd5, #ACB6E5);
      background: linear-gradient(to right, #74ebd5, #ACB6E5);
      min-height: 100vh;

    }
  </style>

  @include('includes.navbar')
  <!-- Aquí irá la vista de las listas de reproducción creadas por el usuario -->
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-7 mx-auto bg-white rounded shadow">
        <div class="table-responsive">
          <table class="table table-fixed">
            <thead>
              <tr>
                <td>ID</td>
                <td>Nombre playlist</td>
                <td>Fecha creación</td>
                <td colspan=2>Acciones</td>
              </tr>
            </thead>
            <tbody>
              @foreach($playlists as $p)
              @if($p->user_id == auth()->user()->id)
              <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->playlist_name}}</td>
                <td>{{$p->creation_date}}</td>
                <td>
                  <form action="/playlists/show/{{$p->id}}" method="GET">
                    <button type="submit" class="btn btn-primary">Ver</button>
                </td>
                <td>
                  <form action="/playlists/delete/{{$p->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                  </form>
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>