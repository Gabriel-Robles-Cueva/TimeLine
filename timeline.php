<?php 
session_start();
	$cartas = array(1,2,3,4,5,6,7,8,9,10,11);
	$_SESSION["baraja"]=$cartas;
	$_SESSION["cartasMesa"]= array();
	$_SESSION["cartasMano"]= array();
	shuffle($_SESSION["baraja"]);

	$_SESSION["cartasMesa"][]= array_shift($_SESSION["baraja"]);
	for($i=0; $i<3; $i++){
		$_SESSION["cartasMano"][] = array_shift($_SESSION["baraja"]);
	}

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
			sort($_SESSION['cartasMesa']);
			echo "<div class='cartaMesa'>	
			<input type='radio' name='tablero' id='$i' class='left' value='left'>";
			print_r($_SESSION["cartasMesa"][$i]);
			echo "<input type='radio' name='tablero' id='$i' class='right' value='right'>
			</div>";
		}
		?>
		
	</div>

	<?php  
		if (isset($_POST['tablero'])) {
			
		}
	?>


	<div class="nuevo">
			NUEVO
	</div>
	<div class="misCartas">
	<?php
	
	for ($i=0; $i < count($_SESSION['cartasMano']); $i++) {
		$robo = $_SESSION['cartasMano'][$i];
		echo '<div class="cartaMano" onclick="">';
		echo "<input name='cartaMano' type='radio' name='test' value='$robo'>";
		print_r($_SESSION['cartasMano'][$i]);
		echo'</div>';
	}
	/* do{
	}while(count($_SESSION["baraja"])!=0);  */
	?>

		<button onclick="colocar()">COLOCAR</button>

	</div>
</body>
</html>