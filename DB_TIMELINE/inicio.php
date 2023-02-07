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
	?>
	<h1 align="center">INICIO TIMELINE</h1>
	<div class="container">
		<form method="post" action="dommy.php"> 
		<h3>Elige Un Mazo:</h3> &nbsp;&nbsp;
		<select name="mazo" class="form-select" style="width: 200px;">
			<?php  
				$resultados= getAllMazos($conDB);
				var_export($resultados);
				for ($i=0; $i < count($resultados); $i++) { 
					echo "<option>".$resultados[$i]["NOMBRE"]."</option>";
				}
			?>
		</select>
		<br><br>
		<button class="btn btn-outline-primary">EMPEZAR</button>
		</form>
	</div>
</body>
</html>