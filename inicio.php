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
<html>
    <body style="background-image: url(./img/espacio.jpg); background-size: 100% 100%; background-repeat: no-repeat; background-attachment: fixed;">
        <form action="timeline.php">
        <h1 align = center>Bienvendio a Timeline</h1>
        <div align="center">
        <p><img src="./img/Maquina.png" width="500px" height="400px"></p>
        <input type=submit value="EMPECEMOS" style="width: 200px; height: 100px; background: rgb(30, 130, 90);" />
        </div>
        </form>
    </body>
</html>