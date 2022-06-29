<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  /*.grid > div{
  background: #6148cf;
  padding: 1em;
}*/

  /*.grid > div:hover{
  border: 1px solid #f1c40f;
}*/

  .element1 {
    grid-column: 1/3;
  }

  .element2 {
    grid-row: 2/3;
    grid-column: 1/2;
  }

  .element3 {
    grid-column: 2/3;
    grid-row: 2/3;
  }

  .element4 {
    grid-column: 1/3;
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

  tr:hover td {
    background-color: #313060;
    color: white;
  }
</style>


<body style="margin-bottom:22px">


  @include('includes.navbar')
  <section class="mt-3">
    <div class="container">
      <h1>Administración de plataforma</h1>
      <div class="row text-center mb-3">
        
      <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="" class="btn btn-primary">Usuarios</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Canciones</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Albumes</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Géneros</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Países</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Métodos de pago</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Listas de reproducción</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Valoraciones</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Recibos</a>
            </div>
          </div>
        </div>

        <div class="col-3 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2022/06/21/21/15/audio-7276511_960_720.jpg" class="card-img-top">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Roles</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>




  <!-- Aquí irá la muestra de las canciones favoritas del usuario logueado -->
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>