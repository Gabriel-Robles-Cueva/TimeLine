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

      	if (isset($_POST["nombre"])) {
      		$nombre = $_POST["nombre"];
			borrarMazo($conDB, $nombre);
      	}
	?>
	<h1 align="center">BORRAR MAZO</h1>
	<form method="post" action="borrarMazo.php"> 
	Mazo a Borrar &nbsp;<select name="nombre">
		<?php  
			$resultados= getAllMazos($conDB);
			var_export($resultados);
			for ($i=0; $i < count($resultados); $i++) { 
				echo "<option>".$resultados[$i]["NOMBRE"]."</option>";
			}
		?>
	</select>
	<br><br>
	<button>BORRAR</button>
	</form>
</body>
</html>