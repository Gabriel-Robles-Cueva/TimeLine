<?php 
session_start();
	$cartas = array(1,2,3,4,5,6,7,8,9,10,11);
	$_SESSION["baraja"]=$cartas;
	$_SESSION["cartasMesa"]= array();
	$_SESSION["cartasMano"]= array();
	shuffle($_SESSION["baraja"]);


	$primerCarta= array_shift($_SESSION["baraja"]);
	array_push($_SESSION["cartasMesa"], $primerCarta);

	$cartaUno= array_shift($_SESSION["baraja"]);
	array_push($_SESSION["cartasMano"], $cartaUno);

	$cartaDos= array_shift($_SESSION["baraja"]);
	array_push($_SESSION["cartasMano"], $cartaDos);

	$cartaTres= array_shift($_SESSION["baraja"]);
	array_push($_SESSION["cartasMano"], $cartaTres);
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
	<?php
	for ($i=0; $i < 3; $i++) { 
		echo '<div class="misCartas">';
		echo '<div class="cartaMano" onclick="">';
		echo '<input type="radio" name="test" value="$cartaUno">';
		print_r($cartaUno);
		echo'</div>';
	}
	do{
		
	}while(count($_SESSION["baraja"])!=0);
	?>
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
