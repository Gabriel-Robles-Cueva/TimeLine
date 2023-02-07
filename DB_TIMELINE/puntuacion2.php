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

  	$_SESSION['nombre']= $_POST['nombre'];
  	$nombre= $_SESSION['nombre'];
  	$puntos= $_SESSION['puntos'];
  	$mazo= $_SESSION['mazo'];
  	crearJugador($conDB, $nombre, $mazo, $puntos);

	?>
	<h1 align="center">RANKING PUNTUACIONES</h1>
	<div class="container">
		<form method="post" action="puntuacion.php"> 
		<br><br>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">NOMBRE</th>
		      <th scope="col">MAZO</th>
		      <th scope="col">PUNTOS</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php 
				$resultados= getTopJugadores($conDB);
				$puesto= 1;
				for ($i=0; $i < count($resultados); $i++) { 
					echo "<tr>";
		      echo "<th scope='row'>".$puesto."</th>";
		      echo "<td>".$resultados[$i]["NOMBRE"]."</td>";
		      echo "<td>".$resultados[$i]["MAZO"]."</td>";
		      echo "<td>".$resultados[$i]["PUNTUACION"]."</td>";
		      echo "</tr>";
		      $puesto++;
				}
			?>
		  </tbody>
		</table>
		<br><br>
		<button class="btn btn-outline-primary" formaction="inicio.php">SALIR</button>
		</form>
	</div>
</body>
</html>