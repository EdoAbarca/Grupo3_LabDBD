<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Iniciar sesión</title>

	<!--<link href="{{ asset('css/login.css') }}" rel="stylesheet">-->
</head>
<style>

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

.dUvQaU {
    box-sizing: border-box;
    font-family: spotify-circular, Helvetica, Arial, sans-serif;
    -webkit-tap-highlight-color: transparent;
    font-size: 0.875rem;
    line-height: 1.25rem;
    -webkit-box-align: center;
    align-items: center;
    display: flex;
    font-weight: 700;
    width: 100%;
    padding-bottom: 8px;
}

</style>
<body>
	@include('includes.navbar')
	<div class="row" style="background-color:#313060">
		<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card px-5 py-5" style="background-color:#f1f1f1">
					<div class="col-md-12'" >Iniciar Sesión</div>
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
						<div class="field" >	
							<input id="email" name=email type="text" required placeholder="Email">
						</div>
						<div class="field">
							<input id="password" name=password type="password" required placeholder="Password">
						</div>
	
						<div class="field">
							<p>lol</p>
						</div>	

						<div class="text-center">
							<input id="botonLog" class="btn btn-outline-success" type="submit" value="Login">
						</div>
						<div class="signup-link">¿No eres miembro? <a href="/register">Regístrate aquí</a>
						</div>
					</form>
				</div>
			</div>
	</div>
	@include('includes.footer')
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</body>
