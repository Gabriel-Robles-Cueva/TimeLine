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
		<div class="cartasMesa" id="cartasMesa">
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
		<div class="misCartas" id="misCartas">
		<?php
		for ($i=0; $i < count($_SESSION['cartasMano']); $i++) {
			$robo = $_SESSION['cartasMano'][$i];
		?>
		<div class="cartaMano">
		<input name='cartaMano' id='<?php $i ?>' type='radio' value='<?php $robo ?>'>
		<?php 
			print_r($_SESSION['cartasMano'][$i]);
		?>
		</div>
		<?php
			}
		?>
			<button onclick='colocar()'>COLOCAR</button>
		</div>

	<script type="text/javascript">

		function probar(){
			/*var divFr= document.createElement("div")

			divFr.style.backgroundColor= "red"
			divFr.style.width= "200px"
			divFr.style.height= "200px"
			divFr.style.margin= "auto"

			document.body.appendChild(divFr)*/
			var prueba= document.getElementsByName("tablero");
			var prueba2= document.getElementsByName('cartaMano')
			var prueba3= document.getElementById('misCartas')

			for(i=0; i<prueba.length; i++){
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