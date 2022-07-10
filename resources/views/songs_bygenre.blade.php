<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Songs filter by Genre</title>

    <!-- <link href="{{ asset('css/search.css') }}" rel="stylesheet"> -->
</head>
<style>
    body {
        background: #f1f1f1;
        /* color de fondo*/
        font-family: "Century Gothic";
    }

    .menu {
        list-style: none;
        /* le quita los puntos a la "lista"*/
        line-height: 42px;
        /* espacio entre los titulos*/
        /*margin: 0em; /* separación con el borde izquierdo*/
        /*outline: 1px solid blue;*/
        padding-left: 0;
        /* quita el borde de la izquierda*/
        width: 16em;
        /* tamaño de la caja*/
        font-size: 15px;
    }

    .menu a {
        color: black;
        /* color de las letras*/
        display: block;
        /* todo el box es "cliqueable", no solo donde está la palabra*/
        text-decoration: none;
        /* le quita el subrayado*/
        /*text-transform: uppercase;   todo en mayusuculas*/
    }

    .menu li {
        /*outline: 1px solid green;*/
        /*border-left: 3px solid rgba(255,255,255,.2); color del borde*/
        box-shadow: 12px 0 rgb(49, 48, 96) inset;
        padding-left: 1em;
        margin-bottom: 16px;
        /* margen del botón*/
        /*--webkit-transition: all.3s; /* transición
    -o-transition: all.3s;
    transition: all.3s;*/
    }

    .menu li:hover {
        /* lo hace cuando pasas el mouse por encima*/
        box-shadow: 16em 1px 0 rgb(49, 48, 96) inset;
        /* tamaño y color de la barra que aparece cuando pasas el mouse*/
    }



    .grid {
        display: grid;
        grid-template-columns:
            /*repeat(5,1fr);*/
            260px;
        /*gap: 1em; 
    /*grid-template-rows: 700px;*/

        /*justify-items: stretch;*/
    }

    .grid>div {
        background: #f1f1f1;
        /*padding: 1em;*/
    }

    /*.grid>div:hover {
    border: 1px solid #6148cf;
  }*/

    .element1 {
        grid-row: 1/38;

        /*align-self: stretch;*/
        /*grid-column: 1/2;*/
    }

    .element2 {
        grid-row: 2/38;
        grid-column: 2/3;
    }

    .element3 {
        justify-self: end;
        /*|grid-column: 2/3;
  grid-column: 2/3;*/
    }
</style>

<body style="margin-bottom:22px">
    @include('includes.navbar')
    <div class="element2">
        <h4 class="mb-3">Filtrar Canciones</h4>
        <div class="row text-center mb-2">
            @foreach($songs as $s)
            @foreach($song_genres as $sg)
            @if($sg->genre_id == $idGenre and $sg->song_id == $s->id)
            <div class="col-2 d-flex justify-content-center">
                <div class="card" style="width: 10rem;">
                    <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg">
                    <div class="card-body">
                        <h5 class="card-title">{{$s->song_name}}</h5>
                        <form method="GET" action="/playing_song/{{$s->id}}">
                            <button type="submit" class="btn btn-primary">Reproducir Cancion</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
    <div class="element3">
        <!-- Aquí irá la vista que mostrará los resultados de la busqueda realizada -->
        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>