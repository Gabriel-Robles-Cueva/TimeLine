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

      	if (isset($_POST["nombre"])) {
      		$nombre = $_POST["nombre"];
      		$nombreCam = $_POST["nombreCam"];
			$desc = $_POST["descripcion"];
			modificarMazo($conDB,$nombre,$nombreCam,$desc);	
      	}
	?>
	<div class="container">
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
	</div>
</body>
</html>