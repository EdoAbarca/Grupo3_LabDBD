<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Profile</title>

  <!-- <link href="{{ asset('css/profile.css') }}" rel="stylesheet"> -->

</head>

<style>
  .head {
    text-align: center;
    height: 300px;
    padding: 12px;
  }

  .avatar {
    width: 200px;
    height: 200px;
    border-radius: 50%;
  }

  .user-name {
    font-size: 18px;
    margin-top: 14px;
  }
</style>

<body style="margin-bottom:22px">
  <!-- Aquí irá la vista al perfil del usuario logueado (A la espera de adaptar a todos los usuarios)-->
  @php
  $followers_count=0;
  $follows_count=0;
  @endphp
  @foreach($users as $u)
  @if($u->id==auth()->user()->id)
  @foreach($locations as $l)
  @if($u->location_id == $l->id)
  @foreach($roles as $r)
  @if($u->role_id==$r->id)
  @foreach($follows as $f)
  @if($f->follow_id==$u->id)

  @php
  $followers_count=$follows_count + 1;
  @endphp

  @endif
  @if($f->follower_id==$u->id)

  @php
  $follows_count=$followers_count + 1;
  @endphp

  @endif
  @endforeach

  @include('includes.navbar')
  <div class="head">
    <img class="avatar" src="https://pbs.twimg.com/profile_images/1301751032398004224/rGaROP0I_400x400.jpg" />
    <!-- Nombre Usuario -->
    <h1 class="user-name">{{$u->nickname}}</h1>
    <!-- Rol Usuario -->
    <h1 class="role-user">{{$r->role_name}}</h1>
    <!-- Ubicacion Usuario -->
    <small class="text-muted">
      <i class="fa fa-map-marker"></i>{{$l->name}}
    </small>
    <!-- Numero de personas siguiendo -->
    <div class="col-xs-6">
      <span class="m-b-xs h4 block">{{$follows_count}}</span>
      <small class="text-muted">Siguiendo</small>
    </div>
    <!-- Numero de seguidores -->
    <div class="col-xs-6">
      <span class="m-b-xs h4 block">{{$followers_count}}</span>
      <small class="text-muted">Seguidores</small>
    </div>
    <div class="text-center">
      <input id="botonLog" class="btn btn-outline-success" type="submit" value="Seguir">
    </div>

  </div>
  <div>
    <!-- Biografia -->
    <h3>Biografia</h3>
    <p>{{$u->biography}}</p>
  </div>
  @endif
	@endforeach
	@endif
	@endforeach
  @endif
	@endforeach

  <a class="btn btn-outline-success" href="/home">Volver</a>




  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>