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
				?>	
				<div class='cartaMesa'>
				<input type='radio' name='tablero' id='tablero' class='left' value='left'>
				<?php 
				print_r($_SESSION["cartasMesa"][$i]);
				?>
				<input type='radio' name='tablero' id='tablero' class='right' value='right'>
				</div>
			<?php
			}
			?>			
		</div>
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