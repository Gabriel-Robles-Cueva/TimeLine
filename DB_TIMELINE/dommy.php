<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
</head>
<body>
	<?php
		session_start();
		require_once("dbutils.php");
  	$conDB = conectarDB();
  	$_SESSION['mazo']= $_POST['mazo'];
	?>
	<h1 align="center">JUEGO PRACTICA</h1>
	<div class="container">
		<form method="post" action="puntuacion.php"> 
		<br><br>
		<div class="input-group input-group-sm mb-3" style="width: 200px;">
		  <span class="input-group-text" id="inputGroup-sizing-sm">PUNTUACION</span>
		  <input type="number" name='puntos' class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
		</div>
		<button class="btn btn-outline-primary">JUGAR</button>
		</form>
	</div>
</body>
</html>