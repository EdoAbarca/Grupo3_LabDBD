<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Iniciar sesión</title>

	<!--<link href="{{ asset('css/login.css') }}" rel="stylesheet">-->
</head>
<style>
	.card {
		/* Add shadows to create the "card" effect */
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		transition: 0.3s;
	}

	.p {
		font-size: 0.875rem;
		line-height: 1.25rem;
		color: #f1f1f1;
		font-family: "Century Gothic";
	}

	.input {
		border: 10px;
		display: block;
		font-size: 15px;
		line-height: 1.5rem;
		font-weight: normal;
		width: 100%;
		box-sizing: border-box;
		font-family: "Century Gothic";
		-webkit-tap-highlight-color: transparent;
		margin-top: 0px;
		margin-bottom: 0px;
		border-radius: 4px;
		padding: 14px;
		background-color: #f1f1f1;
		box-shadow: inset 0 0 0 1px var(--essential-subdued, #878787);
		color: #313060;
	}
</style>

<body style="background-color:#f1f1f1">

	@include('includes.navbar')

	<div class="row" style="background-color:#f1f1f1">

		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="card px-5 py-5" style="background-color:#313060">
				<!--<div class="col-md-12" style= "color:#f1f1f1">Iniciar Sesión</div>-->
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
						<p class="p">Correo Electrónico</p>
						<input class="input" id="email" name=email type="text" required placeholder="Correo Electrónico">
					</div>
					<div class="field">
						<p class="p">Contraseña</p>
						<input class="input" id="password" name=password type="password" required placeholder="Contraseña">
					</div>
					<div class="text-center">
						<input id="botonLog" class="btn btn-outline-success" type="submit" value="Iniciar Sesión">
					</div>
					<div class="signup-link" style="color:#f1f1f1">¿No eres miembro? <a href="/register" style="color:#f1f1f1">Regístrate aquí</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	@include('includes.footer')
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>