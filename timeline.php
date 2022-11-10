<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TimeLine</title>

	<script type="text/javascript">
		function elegir(){
			<?php echo "string"; ?>
		}
	</script>
</head>
<body style="background-image: 'img/espacion.jpg';">
	<h1 align="center">TIMELINE</h1>
	<?php
		$arrayName = array();
		for ($i=0; $i < 20; $i++) { 
			array_push($arrayName, $i);
		}
		shuffle($arrayName);
	?>
	<div style="background-color: rgb(128, 64, 00); width:100%; height: 40%; margin-top: 30px;">
		<div align="center" style="padding: 5px;">
			<button name="uno" value="A" style="width: 200px; height:250px; background-color: rgb(30, 130, 90);">
			<?php  
				print_r($arrayName[rand(0,19)]);
			?>
		</button>
		</div>
	</div>
	<div style="background-color: rgb(18, 124, 30); width: 100%; height: 40%; margin-top: 10px; padding: 5px;">
		<img style="width: 200px; height:250px; background-color: rgb(30, 130, 90);"></img>
		<div align="center" style="margin-top: -250px;">
		<button name="uno" value="A" style="width: 200px; height:250px; background-color: rgb(30, 130, 90);">
			<?php  
				print_r($arrayName[rand(0,19)]);
			?>
		</button>
		<button name="uno" value="A" style="width: 200px; height:250px; background-color: rgb(30, 130, 90);">
			<?php  
				print_r($arrayName[rand(0,19)]);
			?>
		</button>
		<button name="uno" value="A" style="width: 200px; height:250px; background-color: rgb(30, 130, 90);">
			<?php  
				print_r($arrayName[rand(0,19)]);
			?>
		</button>
		</div>
	</div>
</body>
</html>
