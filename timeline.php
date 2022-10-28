<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TimeLine</title>
</head>
<body bgcolor="lightblue">
	<h1 align="center">TIMELINE</h1>


	<?php
		$arrayName = array();
		for ($i=0; $i < 100; $i++) { 
			array_push($arrayName, $i);
		}
		shuffle($arrayName);
	?>
	<div style="background-color: rgb(128, 64, 00); width:100%; height: 300px; margin-top: 50px;">
		<div align="center" style="padding-top: 50px;">
			<?php  
				print_r($arrayName[rand(0,99)]);
			?>
		</div>
	</div>
	<div style="background-color: brown; width: 200px; height: 300px" align="center">
			<?php  
				print_r($arrayName[rand(0,99)]." ");
				print_r($arrayName[rand(0,99)]." ");
				print_r($arrayName[rand(0,99)]." ");
			?>
	</div>
</body>
</html>