<?php
    session_start();
	$cartas = array(1,2,3,4,5,6,7,8,9,10,11);
	$_SESSION["baraja"]=$cartas;
	$_SESSION["cartasMesa"]= array();
	$_SESSION["cartasMano"]= array();
	shuffle($_SESSION["baraja"]);
?>
<html>
    <body>
        <form action="timeline.php">
        <h1 align = center> Bienvendio</h1>
        <submit value="Empecemos"/>
        </form>
    </body>
</html>