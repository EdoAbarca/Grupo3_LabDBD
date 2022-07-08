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

	.abs-center {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  min-height: 70vh;
}
</style>

<body>
	@include('includes.navbar')

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
	<div class="abs-center">
		<div class="col-md-0"></div>
		<div class="col-md-4">
			<div class="card px-5 py-5" style="background-color:#313060" >
				<form class="login" method="POST" action="/users/create">
					<h5 style="color:white; font-size:25px;">Registro</h5>
					
					<div class="field">
						<p class="p">Nombre Usuario</p>
						<input class="controls" type="text" id="nickname" name=nickname value = "" size="45" placeholder="Nombre de Usuario" required>
					</div>
					
					<div class="field">
						<p class="p">Contraseña</p>
						<input class="controls" type="text" id="password" name=password value = "" size="45" placeholder="Contraseña" required>
					</div>

					<div class="field">
						<p class="p">Fecha de Nacimiento</p>
						<input class="controls" type="text" id="birth_date" name=birth_date value = "" size="45" placeholder="Fecha de nacimiento: AAAA-MM-DD" required>
					</div>

					<div>
						<p class="p">Correo Electronico</p>
						<input class="controls" type="text" id="email" name=email value = "" size="45" placeholder="Correo electronico" required>
					</div>

					<div class="text-center">
						<!-- <select class="form-select" name=location_id id="location_id" size="45" aria-label="Default select example"> -->
						<select class="form-select" name=location_id id="location_id" aria-label="Default select example">
							<option selected>Selecciona una ubicación</option>
							@foreach($locations as $l)
							<option value="{{$l->id}}">{{$l->location_name}}</option>
							@endforeach
						</select>
					</div>
					
					<div class="text-center">
						<select class="form-select" name=role_id id="role_id" aria-label="Default select example">
						<!--<select class="form-select" name=role_id id="role_id" size="45" aria-label="Default select example"> -->
							<option selected>Selecciona un rol</option>
               				<option value="admin">Administrador</option>
							<option value="artist">Artista</option>
                			<option value="user">Usuario</option>
						</select>
					</div>

					<a class="btn btn-outline-success" href="/home">Cancelar</a>
					
					<input id="boton-registro" class="btn btn-outline-success" type="submit" name="" value="Registrarse">

				</form>
				</div>
		</div>

		@include('includes.footer')
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>