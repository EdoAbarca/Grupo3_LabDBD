<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Registro</title>

	<!--<link href="{{ asset('css/register.css') }}" rel="stylesheet">-->
</head>

<style>
.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}
</style>

<body>
	
	<!-- Registro -->
	@if(session('status'))
	<br>
	<ul>
		<li>{{ session('status') }}</li>
	</ul>
	@endif
	@if($errors->any())
	<br>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="card" >
				<form class="login" method="POST" action="/users/create">
					<h5 style="color:green; font-size:20px;">Registro de nuevo usuario</h5>

					<div><input class="controls" type="text" id="nickname" name="nickname" size="45" placeholder="Ingrese un nombre de usuario" required></div>

					<div><input class="controls" type="text" id="password" name="password" size="45" placeholder="Ingrese una contraseña" required></div>

					<div><input class="controls" type="text" id="birth_date" name="birth_date" size="45" placeholder="Ingrese su fecha de nacimiento: AAAA-MM-DD" required></div>

					<div><input class="controls" type="text" id="email" name="email" size="45" placeholder="Ingrese su email" required></div>

					<a class="btn btn-outline-success" href="/home">Cancelar</a>
					
					<input id="boton-registro" class="btn btn-outline-success" type="submit" name="" value="Registrarse">


			


				</form>
				</div>
		</div>

		@include('includes.footer')
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>