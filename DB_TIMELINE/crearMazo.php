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
		require_once("dbutils.php");
      	$conDB = conectarDB();

      	if (isset($_POST["nombre"]) && isset($_POST["descripcion"])) {
      		$nombre = $_POST["nombre"];
			$desc = $_POST["descripcion"];
			crearMazo($conDB, $nombre, $desc);
      	}
	?>
	<h1 align="center">CREAR MAZO</h1>
	<div class="container">
		<form method="post" action="crearMazo.php"> 
		NOMBRE &nbsp;<input type="text" placeholder="Introduce el nombre del mazo" name="nombre" required>
		<br><br>
		DESCRIPCION &nbsp;<input type="text" placeholder="Introduce la descripcion del mazo" name="descripcion">
		<br><br>
		<button>CREAR</button>
		</form>
	</div>
</body>
</html>