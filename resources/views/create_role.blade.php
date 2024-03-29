<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Create role</title>

  <!-- <link href="{{ asset('css/upload_payment_method.css') }}" rel="stylesheet"> -->
</head>

<body style="margin-bottom:22px">


  @include('includes.navbar')
  <!-- Aquí irá el form para subir un método de pago a asociar al usuario -->
  <div class="container">
    <h1>Agregar nuevo rol</h1>
    <hr>
    <form role="form" class="role" method="POST" action="/role/create">
      <div class="well">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group row">
              <label for="nombre" class="col-form-label col-sm-4">Nombre rol:</label>
              <div class="col-sm-8">
                <input type="text" name="role_name" id=role_name class="form-control" placeholder="Nombre">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 col-md-6">
            <input id="boton-subir" class="btn btn-outline-success" type="submit" name="" value="Agregar rol">
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