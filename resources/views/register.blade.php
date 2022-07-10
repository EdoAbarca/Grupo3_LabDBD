<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<title>Registro</title>

	<!--<link href="{{ asset('css/register.css') }}" rel="stylesheet">-->
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
			<div class="card px-5 py-5" style="background-color:#313060">
				<form class="login" method="POST" action="/users/create">

					<div class="form-group">
						<label for="inputNickname" class="control-label" style="color:white">Nombre de usuario</label>
						<input type="text" class="form-control" minlength="2" id="inputName" placeholder="" name=nickname value="" required>
						<div style="color:white" class="help-block">Mínimo de 2 caracteres</div>
					</div>

					<hr>

					<div class="form-group">
						<label for="inputPassword" class="control-label" style="color:white">Contraseña</label>
						<div class="form-inline row">
							<div class="form-group">
								<input type="password" minlength="10" class="form-control" id="inputPassword" name=password value="" placeholder="Contraseña" required>
								<div style="color:white" class="help-block">Mínimo de 10 caracteres</div>
							</div>
						</div>
					</div>


					<hr>

					<div class="form-group">
						<label for="datepicker" class="control-label" style="color:white">Fecha de nacimiento</label>
						<input type="text" class="form-control" id="datepicker" name=birth_date value="" placeholder="Fecha de nacimiento: AAAA-MM-DD" required>


					</div>
					<hr>

					<div class="form-group">
						<label for="inputEmail" class="control-label" style="color:white">Email</label>
						<input type="text" class="form-control" id="inputEmail" name=email value="" placeholder="ejemplo@gmail.com" required>
						<div style="color:white" class="help-block">Mínimo de 7 caracteres</div>
					</div>

					<hr>

					<div class="field" style="color:white">Ubicación
						<select class="form-select" name=location_id id="location_id" aria-label="Default select example" required>
							<!--<select class="form-select" name=role_id id="role_id" size="45" aria-label="Default select example"> -->
							<option selected disabled value="">Selecciona una ubicación</option>
							@foreach($locations as $l)
							<option value="{{$l->id}}">{{$l->location_name}}</option>
							@endforeach
						</select>
					</div>

					<hr>
					<div class="field" style="color:white">Rol
						<select class="form-select" name=role_id id="role_id" aria-label="Default select example" required>
							<!--<select class="form-select" name=role_id id="role_id" size="45" aria-label="Default select example"> -->
							<option selected disabled value="">Selecciona un rol</option>
							<option value=1>Administrador</option>
							<option value=2>Artista</option>
							<option value=3>Usuario</option>
						</select>
					</div>
					<hr>

					<a class="btn btn-outline-success" href="/home">Cancelar</a>

					<input id="boton-registro" class="btn btn-outline-success" type="submit" name="" value="Registrarse">

				</form>


			</div>

			</form>
		</div>
	</div>
	</div>







	@include('includes.footer')
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(function() {
			$('#datepicker').datepicker();
		});
	</script>

</body>