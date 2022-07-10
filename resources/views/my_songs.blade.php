<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Search</title>

    <!-- <link href="{{ asset('css/search.css') }}" rel="stylesheet"> -->
</head>




@include('includes.navbar')

<body style="margin-bottom:22px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="display-3">Mis Canciones</h1>
                <div class="alert alert-success">

                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre Cancion</td>
                            <td>ID Album Asociado</td>
                            <td>Fecha</td>
                            <td colspan=2>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($albums as $album)
                        @if($album->user_id == auth()->user()->id)
                        @foreach($songs as $song)
                        @if($album->id == $song->album_id)
                        <tr>
                            <td>{{$song->id}}</td>
                            <td>{{$song->song_name}}</td>
                            <td>{{$song->album_id}}</td>
                            <td>{{$song->release_date}}</td>
                            <td>
                                <form action="/songs/edit2/{{$song->id}}" method="GET">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form method="GET" action="/playing_song/{{$song->id}}">
                                    <button type="submit" class="btn">Reproducir Cancion</button>
                                </form>
                            </td>
                            <td>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @endif

                        @endforeach
                    </tbody>
                </table>
                <div>
                </div>
            </div>
            <script src="{{ asset('js/app.js') }}" type="text/js"></script>

            @include('includes.footer')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>