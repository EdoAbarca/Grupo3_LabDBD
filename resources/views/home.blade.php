<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Home</title>

  <!-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> -->
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


  .button:hover {
    color: #f1f1f1;
  }

  .button.button{
    border: 0px;
  }
</style>


<body>
  <!-- Aquí irá lo que se verá al montar la página web, será el punto de partida para realizar las distintas acciones-->
  @include('includes.navbar')
  @guest
  @endguest
  @auth
  <div class="grid">
    <div class="element1">
      <ul class="menu">
        <h1>JELfy Music</h1>
        <p>Descubre Música</p>
        <li><a class="button" href="/songranking">Canciones más escuchadas</a></li>
        <!--<li><a class="button" href="#">Buscador</a></li>-->
        <li><a class="button" href="/songs_filter">Filtrar canciones por genero</a></li>
        <li><a class="button" href="/locations_filter">Filtrar canciones por ubicación</a></li>
        <li><a class="button" href="/artists">Explorar artistas</a></li>
        <p>Tu Biblioteca de música</p>
        <li><a class="button" href="/favsongs">Canciones que te gustan</a></li>
        <li><a class="button" href="/user_playlists">Listas de reproducción</a></li>
        <li><a class="button" href="/user_rates">Ver valoraciones</a></li>
        <li>
          <form action="/my_songs/{{auth()->user()->id}}" method="GET">
            <button class="button" type="submit">Mis canciones</button>
          </form>
        </li>
      </ul>
    </div>
    <div class="element2">
      <h4 class="mb-3">Descrubre nueva música</h4>
      <div class="row text-center mb-2" method="GET" action="/home">
      @php $i=0 @endphp  
      
      @foreach($songs as $song)
      @if($i <= 11)
        <div class="col-2 d-flex justify-content-center">
          <div class="card" style="width: 10rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg">
            
            <div class="card-body">
              <h5 class="card-title">{{$song->song_name}}</h5>
              <div>
                <form method="GET" action="/playing_song/{{$song->id}}">
                  <button type="submit" class="btn">Reproducir</button>
                </form>
                
                <form class="like" method="POST" action="/likes/create">
                  <div>
                    <input class="invisible d-none"  id="song_id" name="song_id" value="{{$song->id}}">
                  </div>
                  <div>
                    <input class="invisible d-none" id="user_id" name="user_id" value="{{auth()->user()->id}}">
                  </div>
                  <button type="submit" class="btn">Like</button>
                  <div>
                  </div>
                </form>

                @php
                $i=$i+1
                @endphp
                @endif

              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  </ul>
  @endauth
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>