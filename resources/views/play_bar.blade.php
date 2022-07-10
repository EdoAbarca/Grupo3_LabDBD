<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Play_bar</title>

  <!-- <link href="{{ asset('css/search.css') }}" rel="stylesheet"> -->
</head>

<style>
  *{
    margin: 0;
    padding: 0;
  }
  .letras{
    font-family: "Century Gothic";
    font-size: 20px;
    color: #fff;
    text-align: center;
    margin-top: 10px;
  }
  section{
    width: 100%;
    height: 100vh;
    background-color: #fff; 
    background: linear-gradient(45deg, #2874A6,#313060,black);
    background-size:120% 120%;
    position: relative;
  }
  .container {
    height: 100hv;
    width: 100%;
    background-color: #f1f1f1;
    background-size: cover;
    position: relative;
  }

  .content {
    width: 100%;
    position: absolute;
    top: 30%;
  }

  .left-col{
    margin-left: 6%;
  }

  .left-col h1{
    font-size: 90px;
    color: #313060;
    line-height: 110px;
    float: left;
  }

  .right-col{
    float: right;
    margin-right: 6%;
    margin-top: 120px;
    display: flex;
    align-items: center;
  }

  .right-col p{
    font-size: 18px;
    color: #313060;
    font-weight: 400%;
    margin-right: 15px;
  }

  #icon{
    width: 80px;
    cursor: pointer;
  }
</style>

<body style="margin-bottom:22px">
<section>
  @include('includes.navbar')
  <div class="container">
    <div class="content">
      <div class="left-col">
        <h1 style="color:antiquewhite" class=letras>Canción<br>en curso</h1>
      </div>
      <div class="right-col">
        <p style="color:antiquewhite" >Reproducir Cancion</p>
        <img src="{{URL('media/pause.png')}}" id="icon">
      </div>
      <!--<audio controls="">
      <source src="{{$song->URL}}" type="audio/mp3">
    </audio>-->
    </div>
    <audio preload="auto" id="song" autoplay>
      <source src="{{$song->URL}}" type="audio/mp3">
    </audio>

    <script>
      var song = document.getElementById("song");
      var icon = document.getElementById("icon");

      icon.onclick = function(){
        if(song.paused){
          song.play();
          icon.src = "{{URL('media/pause.png')}}";
        }
        else{
          song.pause();
          icon.src = "{{URL('media/play.png')}}";
        }
      }

    </script>
</section>
    @include('includes.footer')
</body>

</html>