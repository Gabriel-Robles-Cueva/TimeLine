<?php 
	$cartas = array(1,2,3,4,5,6,7,8,9,10,11);
	$cartasTablero= array();
	$misCartas= array();
	shuffle($cartas);


	$primerCarta= array_shift($cartas);
	array_push($cartasTablero, $primerCarta);

	$cartaUno= array_shift($cartas);
	array_push($misCartas, $cartaUno);

	$cartaDos= array_shift($cartas);
	array_push($misCartas, $cartaDos);

	$cartaTres= array_shift($cartas);
	array_push($misCartas, $cartaTres);
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
		<div class="cartaMesa">	
			<input type="radio" name="tablero" id="1" class="left" value="left">
			<?php
				print_r($primerCarta);
			?>
			<input type="radio" name="tablero" id="1" class="right" value="right">
		</div>
	</div>
	<div class="nuevo">
			NUEVO
	</div>
	<div class="misCartas">
		<div class="cartaMano" onclick="">
			<?php
				echo "<input type='radio' name='test' value='$cartaUno'>";
				print_r($cartaUno);
			?>
		</div>
		<div class="cartaMano">
			<?php  
				echo "<input type='radio' name='test' value='$cartaDos'>";
				print_r($cartaDos);
			?>
		</div>
		<div class="cartaMano">
			<?php  
				echo "<input type='radio' name='test' value='$cartaTres'>";
				print_r($cartaTres);
			?>
		</div>

		<button onclick="probar()">COLOCAR</button>
	</div>
</body>
</html>
