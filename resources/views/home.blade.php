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

body{
  background: #f1f1f1;        /* color de fondo*/
}

.menu{
  list-style: none;           /* le quita los puntos a la "lista"*/    
  line-height: 42px;          /* espacio entre los titulos*/
  /*outline: 1px solid blue;*/
  padding-left: 0;            /* quita el borde de la izquierda*/
  width: 250px;               /* tamaño de la caja*/
}

.menu a{
  color: #111;                /* color de las letras*/
  text-decoration: none;      /* le quita el subrayado*/
  text-transform: uppercase;  /* todo en mayusuculas*/
}

.menu li{
  /*outline: 1px solid green;*/
  /*border-left: 3px solid rgba(255,255,255,.2); color del borde*/
  box-shadow: 3px 0 rgb(49,48,96) inset;
  padding-left: 1.5em;                        
  margin-bottom: 5px;                         /* margen del botón*/
}

</style>


<body>


  @include('includes.navbar')
  <ul class="menu">
    <li><a href="#">Nombre plataforma</a></li>
    <p>Descubre Música</p>
    <li><a href="#">Canciones más escuchadas</a></li>
    <li><a href="#">Buscador</a></li>
    <p>Tu Biblioteca de música</p>
    <li><a href="#">Canciones que te gustan</a></li>
    <li><a href="#">Lista de reproducción 1</a></li>
    <li><a href="#">Lista de reproducción 1</a></li>
    <li><a href="#">Lista de reproducción 1</a></li>
  </ul>

  <!-- Aquí irá lo que se verá al montar la página web, será el punto de partida para realizar las distintas acciones-->
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>