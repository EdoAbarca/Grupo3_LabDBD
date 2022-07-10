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

<style>

.grid {
  justify-content: stretch;
  display: grid;
  grid-template-columns: repeat(2,1fr);
  gap: 1em;
  grid-template-rows: 70px 150px 270px;
  padding-left: 2em;
  padding-right: 2em;

}

/*.grid > div{
  background: #6148cf;
  padding: 1em;
}*/

/*.grid > div:hover{
  border: 1px solid #f1c40f;
}*/

.element1{
  grid-column: 1/3;
}

.element2{
  grid-row: 2/3;
  grid-column: 1/2;
}

.element3{
  grid-column: 2/3;
  grid-row: 2/3;
}

.element4{
  grid-column: 1/3;
}


body{
  background-color: #f1f1f1;
  font-family: "Century Gothic";

}

#main-container{
  margin: 150px auto;
  width: 1000px;
}

table{
  background-color: white;
  text-align: left;
  width: 100%;
  border-collapse: collapse;
}

th, td{
  /*border: solid 1px black;*/
  padding: 20;
}

thead{
  background-color: #313060;
  border-bottom: slid 5pc #0f362d;
  color: white;
}

tr:nth-child(even){
  background-color: #ddd;
}

tr:hover td{
  background-color: #313060;
  color: white;
}

</style>

  @include('includes.navbar')
  <!-- Aquí irá la vista de las listas de reproducción creadas por el usuario -->
  <body style="margin-bottom:22px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="display-3">Listas de reproducción creadas</h1>
        <div>
          <a href="/create_playlist" class="btn btn-primary mb-3">Crear lista de reproducción</a>
        </div>

        <div class="alert alert-success">

        </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <td>ID</td>
              <td>Nombre playlist</td>
              <td>Fecha de creación</td>
              <td colspan=2>Acciones</td>
            </tr>
          </thead>
          <tbody>
            @foreach($playlists as $p)
            <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->playlist_name}}</td>
              <td>{{$p->creation_date}}</td>
              <td>
                <form action="#" method="GET"><!-- A implementar ruta -->
                  <button type="submit" class="btn btn-primary">Ver</button>
                  </form>
              </td>
              <td>
             
                <form action="#" method="POST"><!-- A implementar ruta -->
                  @csrf
                  @method('PUT')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div>
        </div>
      </div>
      <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>