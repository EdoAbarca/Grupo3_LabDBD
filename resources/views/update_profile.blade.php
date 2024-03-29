<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Update profile</title>

  <!-- <link href="{{ asset('css/update_profile.css') }}" rel="stylesheet"> -->
</head>

<body style="margin-bottom:22px">


  @include('includes.navbar')
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">Actualizar Perfil</h1>
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
        <form method="POST" action="/users/update2/{{$user->id}}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nickname">Nombre de usuario:</label>
            <input type="text" class="form-control" name="nickname" value="{{$user->nickname}}" placeholder="" required/>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}" required/>
          </div>


          <div class="form-group">
            <label for="birth_date">Fecha de nacimiento:</label>
            <input type="text" class="form-control" name="birth_date" value="" required/>
          </div>

          <div class="form-group">
            <label for="biography">Biografia:</label>
            <input type="text" class="form-control" name="biography" value="" required/>
          </div>

          <div class="form-group">Ubicación
            <select class="form-select" name=location_id id="location_id" aria-label="Default select example" required>
              <option selected disabled value="">Selecciona una ubicación</option>
              @foreach($locations as $l)
              <option value="{{$l->id}}">{{$l->location_name}}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
        </form>
      </div>
    </div>
  </div>
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>