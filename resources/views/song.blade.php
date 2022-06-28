<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Song being played</title>

    <!-- aki es ajeno-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<title>Player</title>
	<meta name="author" content="Maint, FreeShare Inc.">
	<meta name="description" content="Music player created by Maint(FS Corp)">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://freeshared.org/css/bootstrap.css">
	<link rel="stylesheet" href="http://freeshared.org/css/bootstrap.min.css">
	<script src="http://freeshared.org/js/jquery.js"></script>
	<script src="http://freeshared.org/js/bootstrap.js"></script>
	<script src="http://freeshared.org/js/bootstrap.min.js"></script>
	<script src="http://freeshared.org/js/npm.js"></script>
<!-- aki es ajeno-->

    <!-- <link href="{{ asset('css/song.css') }}" rel="stylesheet"> -->
</head>

<body style="margin-bottom:22px">


    @include('includes.navbar')
    <!-- Aquí irá la vista a la canción seleccionada -->
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>

    <!-- aki es ajeno-->
    <div class="col-md-12">
		<audio id="audio" preload="auto"></audio>
		<div class="btn-group">
				<div class="col-md-12">
		<audio id="audio" preload="auto"></audio>
		<div class="btn-group">
			<button onclick="Play('music.mp3','audio');" class="btn btn-custom"><span title="Play" id="play" class="glyphicon glyphicon-play aligned"></span></button>
			<button onclick="Stop('music.mp3','audio');" class="btn btn-custom"><span title="Stop" id="stop" class="glyphicon glyphicon-stop aligned"></span></button>
			<button onclick="Restart('music.mp3','audio');" class="btn btn-custom"><span title="Restart" id="restart" class="glyphicon glyphicon-step-backward aligned"></span></button>
			<button onclick="Backward5('music.mp3','audio');" class="btn btn-custom"><span title="-5 seconds" id="play" class="glyphicon glyphicon-fast-backward aligned"></span></button>
			<button onclick="Forward5('music.mp3','audio');" class="btn btn-custom"><span title="+5 seconds" id="play" class="glyphicon glyphicon-fast-forward aligned"></span></button>
			<button onclick="Backward1('music.mp3','audio');" class="btn btn-custom"><span title="-1 second" id="play" class="glyphicon glyphicon-chevron-left aligned"></span></button>
			<button onclick="Forward1('music.mp3','audio');" class="btn btn-custom"><span title="+1 second" id="play" class="glyphicon glyphicon-chevron-right aligned"></span></button>
			<button onclick="VolumeUp('music.mp3','audio');" class="btn btn-custom"><span title="Volume Up" id="volumeup" class="glyphicon glyphicon-plus aligned"></span></button>
			<button onclick="VolumeDown('music.mp3','audio');" class="btn btn-custom"><span title="Volume Down" id="volumedown" class="glyphicon glyphicon-minus aligned"></span></button>
		</div>
	</div>
  <!-- aki es ajeno-->
</body>

</html>