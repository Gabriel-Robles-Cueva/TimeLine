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

      	if (isset($_POST["nombre"]) && $_POST["descripcion"] != "") {
      		$nombre = $_POST["nombre"];
			$desc = $_POST["descripcion"];
			modificarMazoDesc($conDB,$nombre,$desc);	
      	}

      	if (isset($_POST["nombre"]) && $_POST["nombreCam"] != "") {
      		$nombre = $_POST["nombre"];
      		$nombreCam = $_POST["nombreCam"];
			modificarMazoNombre($conDB,$nombre,$nombreCam);	
      	}

      	if (isset($_POST["nombre"]) && $_POST["descripcion"] != "" && $_POST["nombreCam"] != "") {
      		$nombre = $_POST["nombre"];
      		$nombreCam = $_POST["nombreCam"];
			$desc = $_POST["descripcion"];
			modificarMazo($conDB,$nombre,$nombreCam,$desc);	
      	}

      	/*if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["nombreCam"])) {
      		$nombre = $_POST["nombre"];
      		$nombreCam = $_POST["nombreCam"];
			$desc = $_POST["descripcion"];
			modificarMazo2($conDB,$nombre,$nombreCam,$desc);	
      	}*/
	?>
	<h1 align="center">MODIFICAR MAZO</h1>
	<form method="post" action="modificarMazo.php"> 
	Mazo a Modificar &nbsp;<select name="nombre">
		<?php  
			$resultados= getAllMazos($conDB);
			var_export($resultados);
			for ($i=0; $i < count($resultados); $i++) { 
				echo "<option>".$resultados[$i]["NOMBRE"]."</option>";
			}
		?>
	</select>
	<br><br>
	Nuevo Nombre &nbsp;<input type="text" placeholder="Cambia el nombre" name="nombreCam">
	<br><br>
	Nueva Descripcion &nbsp;<input type="text" placeholder="Cambia la descripcion" name="descripcion">
	<br><br>
	<button>MODIFICAR</button>
	</form>
</body>
</html>