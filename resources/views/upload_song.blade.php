<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Upload song</title>

  <!-- <link href="{{ asset('css/upload_song.css') }}" rel="stylesheet"> -->
</head>

<body style="margin-bottom:22px">


  @include('includes.navbar')
  <!-- Aquí irá el form para subir una cancion -->
  <div class="container">
    <h1>Subir nueva canción</h1>
    <hr>
    <form role="form" class="upload_song" method="POST" action="/songs/create">
      <div class="well">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <label for="nombre" class="col-form-label col-sm-4">Nombre canción:</label>
              <div class="col-sm-8">
                <input type="text" name="song_name" id=song_name class="form-control" placeholder="" tabindex="1">
              </div>
            </div>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <label for="apellido" class="col-form-label col-sm-4">Parental advisory:</label> <!-- Radio button inline de 2 opciones -->
              <div class="col-sm-8">
                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <label for="email" class="col-form-label col-sm-4">Genero:</label> <!-- (a hacer selección parecida a usada en register) -->
              <div class="col-sm-8">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
              </div>
            </div>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <label for="celular" class="col-form-label col-sm-4">ubicación:</label>  <!-- (a hacer selección parecida a usada en register) -->
              <div class="col-sm-8">
                <input type="number" name="celular" id="celular" class="form-control" placeholder="Celular">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 col-md-6">
            <input id="boton-subir" class="btn btn-outline-success" type="submit" name="" value="Subir canción">
          </div>

          <div class="col-xs-6 col-md-6">
            <a class="btn btn-outline-success" href="/home">Cancelar</a>
          </div>
        </div>
    </form>
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
</body>

</html>