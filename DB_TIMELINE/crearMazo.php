<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
	<form method="post" action="crearMazo.php"> 
	NOMBRE &nbsp;<input type="text" placeholder="Introduce el nombre del mazo" name="nombre" required>
	<br><br>
	DESCRIPCION &nbsp;<input type="text" placeholder="Introduce la descripcion del mazo" name="descripcion">
	<br><br>
	<button>CREAR</button>
	</form>
</body>
</html>