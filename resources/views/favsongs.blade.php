<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Favorite logged user songs</title>

    <!-- <link href="{{ asset('css/favsongs.css') }}" rel="stylesheet"> -->
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

.grid > div{
  background: #6148cf;
  padding: 1em;
}

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

</style>


<body style="margin-bottom:22px">


    @include('includes.navbar')
    <div class="grid">
      <div class="element1">
        <h1>Canciones que te gustan</h1>
      </div>
      <div class="element2">element2</div>
      <div class="element3">element3</div>
      <div class="element4">element4</div>
    </div>

    <!-- Aquí irá la muestra de las canciones favoritas del usuario logueado -->
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</body>

</html>