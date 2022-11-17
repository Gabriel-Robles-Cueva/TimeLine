<?php 
session_start();
	$cartas = array(1,2,3,4,5,6,7,8,9,10,11);
	$_SESSION["baraja"]=$cartas;
	$_SESSION["cartasMesa"]= array();
	$_SESSION["cartasMano"]= array();
	shuffle($_SESSION["baraja"]);

	$_SESSION["cartasMesa"][]= array_shift($_SESSION["baraja"]);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TimeLine</title>
	<link rel="stylesheet" href="estilos.css"></link>
</head>
<body class="fondo">
	<h1 align="center" class="titulo">TIMELINE</h1>
	<div class="antiguo">
		ANTIGUO
	</div>
	<div class="cartasMesa">
		<?php
		for ($i=0; $i < count($_SESSION["cartasMesa"]); $i++) { 

			echo "<div class='cartaMesa'>	
			<input type='radio' name='tablero' id='1' class='left' value='left'>";
			print_r($_SESSION['cartasMesa'][$i]);
			echo "<input type='radio' name='tablero' id='2' class='right' value='right'>
			</div>";
		}
		?>
		
	</div>

	<?php  
		function colocar()
		{
			// code...
		}
	?>


	<div class="nuevo">
			NUEVO
	</div>
	<div class="misCartas">
	<?php
	
	for ($i=0; $i < 3; $i++) { 
		$robo= array_shift($_SESSION["baraja"]);
		echo '<div class="cartaMano" onclick="">';
		echo "<input type='radio' name='test' value='$robo'>";
		print_r($robo);
		echo'</div>';
	}
	/* do{
	}while(count($_SESSION["baraja"])!=0);  */
	?>

		<button onclick="colocar()">COLOCAR</button>

	</div>
</body>
</html>