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

<body style="margin-bottom:22px">


    @include('includes.navbar')

    <div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Crear Boleta</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="POST" action="/receipts/create">
          <div class="form-group">    
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name" value="" required/>
          </div>
 
          <div class="form-group">
              <label for="sum">Total:</label>
              <input type="text" class="form-control" name="sum" value="" required/>
          </div>
 
          <div class="form-group">
              <label for="payment_time">Hora del pago:</label>
              <input type="text" class="form-control" name="payment_time" value="" required/>
          </div>

          <div class="form-group">
              <label for="payment_date">Fecha del pago:</label>
              <input type="text" class="form-control" name="payment_date" value="" required/>
          </div>

          <div class="form-group">
              <label for="user_id">ID usuario asociado:</label>
              <input type="number" class="form-control" name="user_id" value="" required/>
          </div>

          <div class="form-group">
              <label for="payment_method_id">ID método de pago asociado:</label>
              <input type="number" class="form-control" name="payment_method_id" value="" required/>
          </div>
          <button type="submit" class="btn btn-primary">Crear Boleta</button>
      </form>
  </div>
</div>
</div>

        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>