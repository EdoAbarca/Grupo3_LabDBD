<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>

	<!--<link href="{{ asset('css/login.css') }}" rel="stylesheet">-->
</head>

<body>
	@include('includes.navbar')
	<div class="row">
		<div class="col-3"></div>
		<div id="colCentral" class="col-3">
			<div class="wrapper">
				<div class="title">Iniciar Sesión</div>
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
				<form method="POST" action="/login">
					<div class="field">
						<input id="email" name=email type="text" required placeholder="Email">
					</div>
					<div class="field">
						<input id="password" name=password type="password" required placeholder="Password">
					</div>
					<div class="text-center">
						<input id="botonLog" class="btn btn-outline-success" type="submit" value="Login">
					</div>
					<div class="signup-link">¿No eres miembro? <a href="/register">Regístrate aquí</a></div>
				</form>
			</div>
		</div>
		<div class="col-3"></div>
	</div>
	@include('includes.footer')
</body>
