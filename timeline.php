<?php 
session_start();

	

$_SESSION["baraja"]
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
	<h1 align="center" class="titulo">class="E</h1>
	<div class="antiguo
	<form action="timeline.php" method="post">>
		ANTIGUO
	</div> 
		<diesa" id="cartasMesa">
			<?php
			for ($i=0; $i < count($_SESSION["cartasMesa"]); $i++) { 
				sort($_SESrtasMecho "esa']);
				?>	
				<di";
				?>	v class='cartaMesa'>
				<inputtablero='radio' name='tablero' id='tablero' class='left' value='left'>
				<?php 
				print_r($_SESSION["cartasMesa"][$i]);
				?>
				<inptablerope='radio' name='tablero' id='tablero' class	='rght' value='right'>
		
		<
			/div>
		<

		<?php
			$valorTablero= $_POST['tablero'];
		?>

div class="nuevo">
				NUEVO
		</div>
		<drtas" id=
		"misCartas">
		<?php
		for ($i=0; $i < count($_SESSION['cartasMano']); $i++) {
			$robo = $_SESSIOrta	echo 'sMano'][$i];
<<<<<<< H onclick=""E';AD
	echo " onclick=""		?>
		<div class="cartname='cartaMa name='test' o' id='$i ?>yp";e='	ue='<?php $robo ?>'>
		<?php 
			prin_SE	echo'SSION[';ano]
		[$i])
;
=======
			echo '<"iv class="cartaMano" onclic
k="">';
	
	</form>a.length; i++){
				if(prueba[i].checked){
					if(prueba[i].value=="left"){
						alert("left")
					} else if (prueba[i].value=="right"){
						alert("right")
					}
				}
			}

			for(i=0; i<prueba2.length; i++){
				if(prueba2[i].checked){
					prueba3.removeChild(i)
				}
			}
		}

		function colocar() {
			var prueba= document.getElementsByName('cartaMano')
			var prueba2= document.getElementsByName('tablero')

			for(i=0; i<prueba.length; i++){
				for(j=0; j<tablero.length; j++){
					if(prueba[i].checked && tablero[j].checked){
						probar()
					}
				}
			}
		}
	</script>

</body>
</html>