<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
              <label for="song_name" class="col-form-label col-sm-4">Nombre canción:</label>
              <div class="col-sm-8">
                <input type="text" name="song_name" id="song_name" value = "" class="form-control" placeholder="Nombre de cancion" tabindex="1">
              </div>
            </div>
          </div>

          <!--<div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <label for="parental_advisory" class="col-form-label col-sm-4">Parental advisory:</label> 
              <div class="col-sm-8">
                <input type="text" name="parental_advisory" id="parental_advisory" class="form-control" placeholder="Restriccion de edad">
              </div>
            </div>
          </div>
        </div> -->

          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <select class="form-select" name="parental_advisory" aria-label="Default select example">
                <option selected>Parental Advisory</option>
                <option  value="1">Si</option>
                <option  value="0">No</option>
              </select>
            </div>
          </div>
          
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group row">
                <label for="album_id" class="col-form-label col-sm-4">Album:</label> <!-- (a hacer selección parecida a usada en register) -->
                <div class="col-sm-8">
                  <input type="number" name="album_id"  id="album_id" value = "" class="form-control" placeholder="Album">
                </div>
              </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group row">
                <label for="location_id" class="col-form-label col-sm-4">Ubicación:</label> <!-- (a hacer selección parecida a usada en register) -->
                <div class="col-sm-8">
                  <input type="number" name="location_id" id="location_id" value = "" class="form-control" placeholder="Ubicacion">
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <label for="duration" class="col-form-label col-sm-4">Duración:</label> <!-- (a hacer selección parecida a usada en register) -->
              <div class="col-sm-8">
                <input type="text" name="duration" id="duration" value = "" class="form-control" placeholder="Duracion">
              </div>
            </div>
          </div>
        </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <label for="URL" class="col-form-label col-sm-4">Link Cancion:</label> <!-- (a hacer selección parecida a usada en register) -->
              <div class="col-sm-8">
                <input type="text" name="URL" id="URL" class="form-control" value = "" placeholder="URL de cancion">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>