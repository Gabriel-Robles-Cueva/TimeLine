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
      		$mazo = $_POST["mazoCam"];
      		$nombreCam = $_POST["nombreCam"];
			$anio = $_POST["anioCam"];
			$img = $_POST["imgCam"];
			modificarCarta($conDB,$nombre, $mazo, $nombreCam, $anio, $img);	
      	}
	?>
	<h1 align="center">MODIFICAR CARTA</h1>
	<div class="container">
		<form method="post" action="modificarCarta.php"> 
		Carta a Modificar &nbsp;<select name="nombre">
			<?php  
				$mazos= getAllMazos($conDB);
				$cartas= getAllCartas($conDB);
				for ($i=0; $i < count($mazos); $i++) { 
					echo "<optgroup label=".$mazos[$i]["NOMBRE"].">";
						for ($j=0; $j < count($cartas); $j++) {
							$cartaMazo= $cartas[$j]["MAZO"];
							$mazoNombre= $mazos[$i]["NOMBRE"];
							if ($mazoNombre == $cartaMazo){
								echo "<option>".$cartas[$j]["NOMBRE"]."</option>";	
							}
						}
					echo "</optgroup>";
				}
			?>
		</select>	
		<br><br>
		Modificar Su Mazo&nbsp;<select name="mazoCam">
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
		Nuevo Año &nbsp;<input type="number" placeholder="Cambia el año" name="anioCam">
		<br><br>
		Nueva Imagen &nbsp;<input type="file" name="imgCam" accept="image/png, .jpg, .jpeg, image/gif">
		<br><br>
		<button>MODIFICAR</button>
		</form>
	</div>
</body>
</html>