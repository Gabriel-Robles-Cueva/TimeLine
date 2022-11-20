<?php 
session_start();

	

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
	<form action="timeline.php" method="post">
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
		function colocar()
		{
			if (isset($_POST['tablero']) and isset($_POST['cartaMano'])) {
				echo "<h1>AAAAAAAAAAAA</h1>";
			}
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
</form>
</body>
</html>