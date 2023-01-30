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

      	if (isset($_POST["mazo"]) && isset($_POST["nombre"]) && isset($_POST["anio"])) {
      		$mazo= $_POST['mazo'];
      		$nombre = $_POST["nombre"];
			$anio = $_POST["anio"];
			$img = $_POST["img"];
			crearMazo($conDB, $mazo, $nombre, $anio, $img);
      	}
	?>
	<h1 align="center">CREAR CARTA</h1>
	<form method="post" action="crearCarta.php"> 
	Mazo Al Que Pertenece &nbsp;<select name="mazo" required>
		<?php  
			$resultados= getAllMazos($conDB);
			var_export($resultados);
			for ($i=0; $i < count($resultados); $i++) { 
				echo "<option>".$resultados[$i]["NOMBRE"]."</option>";
			}
		?>
	</select>
	<br><br>
	NOMBRE &nbsp;<input type="text" placeholder="Introduce el nombre de la carta" name="nombre" required>
	<br><br>
	AÑO &nbsp;<input type="number" placeholder="Introduce El Año Correspondiente" name="anio" required>
	<br><br>
	IMAGEN &nbsp;<input type="file" name="img" accept="image/png, .jpg, .jpeg, image/gif">
	<br><br>
	<button>CREAR</button>
	</form>
</body>
</html>