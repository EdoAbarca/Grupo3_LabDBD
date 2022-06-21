<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>

	<!--<link href="{{ asset('css/register.css') }}" rel="stylesheet">-->
</head>

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

	<form class="login" method="POST" action="/users/create">
		<h5>Registro de nuevo usuario</h5>
		<div><input class="controls" type="text" id="nickname" name="nickname" placeholder="Ingrese un nombre de usuario" required></div>

		<div><input class="controls" type="text" id="password" name="password"  placeholder="Ingrese una contraseña" required></div>

		<div><input class="controls" type="text" id="birth_date" name="birth_date"  placeholder="Ingrese su fecha de nacimiento: AAAA-MM-DD" required></div>
		
		<div><input class="controls" type="text" id="email" name="email"  placeholder="Ingrese su email" required></div>

		<input id="boton-registro" class="btn btn-outline-success" type="submit" name="" value="Registrarse">

		</div>
		<div class="text-center">
			<a class="btn btn-outline-success" href="/">Cancelar</a>
		</div>
	</form>

	@include('includes.footer')
</body>