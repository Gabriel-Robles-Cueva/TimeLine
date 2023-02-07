<?php

  function conectarDB()
  {
    try
    {
      $db = new PDO("mysql:host=localhost;dbname=db_timeline;charset=utf8mb4","root","");
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $db; 
    }
    catch (PDOException $ex)
    {
      echo ("Error al conectar".$ex->getMessage());
    }
  }

  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++GET++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\\


  function getAllMazos($conDb)
  {
    $vectorTotal = array();
    try
    {
      $sql = "SELECT * FROM mazos";
      $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
      $stmt->execute(array());
      while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        $vectorTotal[]=$fila;
      }
     }
    catch (PDOException $ex)
    {
      echo ("Error al conectar".$ex->getMessage());
    }
    return $vectorTotal;
  }

  function getAllCartas($conDb)
  {
    $vectorTotal = array();
    try
    {
      $sql = "SELECT * FROM cartas";
      $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
      $stmt->execute(array());
      while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        $vectorTotal[]=$fila;
      }
     }
    catch (PDOException $ex)
    {
      echo ("Error al conectar".$ex->getMessage());
    }
    return $vectorTotal;
  }


  function getAllCartasFromMazo($conDb, $mazo)
  {
    $vectorTotal = array();
    try
    {
      $sql = "SELECT * FROM cartas WHERE MAZO=:mazo";
      $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
      $stmt->execute(array(":mazo"=>$mazo));
      while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        $vectorTotal[]=$fila;
      }
     }
    catch (PDOException $ex)
    {
      echo ("Error al conectar".$ex->getMessage());
    }
    return $vectorTotal;
  }

  function getTopJugadores($conDb)
  {
    $vectorTotal = array();
    try
    {
      $sql = "SELECT * FROM `jugadores` ORDER BY 4 DESC LIMIT 10;";
      $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
      $stmt->execute(array());
      while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        $vectorTotal[]=$fila;
      }
     }
    catch (PDOException $ex)
    {
      echo ("Error al conectar".$ex->getMessage());
    }
    return $vectorTotal;
  }

  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++CREAR++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\\

  function crearMazo($con, $nombre, $descripcion)
   {
    try {
      $sql= "INSERT INTO mazos(NOMBRE, DESCRIPCION) VALUES (:NOMBRE,:DESCRIPCION)";
      $stmt= $con->prepare($sql);
      $stmt->bindParam(':NOMBRE', $nombre);
      $stmt->bindParam(':DESCRIPCION', $descripcion);
      $stmt->execute();
    } catch (Exception $ex) {
      echo ("Error al crear".$ex->getMessage());
    }
    return $con->lastInsertId();
   }

   function crearCarta($con, $mazo, $nombre, $anio, $img)
   {
    try {
      $sql= "INSERT INTO cartas(MAZO, NOMBRE, ANIO, IMAGEN) VALUES (:MAZO,:NOMBRE,:ANIO,:IMAGEN)";
      $stmt= $con->prepare($sql);
      $stmt->bindParam(':MAZO', $mazo);
      $stmt->bindParam(':NOMBRE', $nombre);
      $stmt->bindParam(':ANIO', $anio);
      $stmt->bindParam(':IMAGEN', $img);
      $stmt->execute();
    } catch (Exception $ex) {
      echo ("Error al crear ".$ex->getMessage());
    }
    return $con->lastInsertId();
   }

   function crearJugador($con, $nombre, $mazo, $puntos)
   {
    try {
      $sql= "INSERT INTO jugadores(NOMBRE, MAZO, PUNTUACION) VALUES (:NOMBRE,:MAZO,:PUNTUACION)";
      $stmt= $con->prepare($sql);
      $stmt->bindParam(':NOMBRE', $nombre);
      $stmt->bindParam(':MAZO', $mazo);
      $stmt->bindParam(':PUNTUACION', $puntos);
      $stmt->execute();
    } catch (Exception $ex) {
      echo ("Error al crear ".$ex->getMessage());
    }
    return $con->lastInsertId();
   }

   //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++BORRAR++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\\

   function borrarMazo($con, $nombre)
   {
    try {
      $sql= "DELETE FROM mazos WHERE NOMBRE=:nombre";
      $stmt= $con->prepare($sql);
      $stmt->bindParam(":nombre",$nombre);
      $stmt->execute();
      $result= $stmt->rowCount();
    } 
    catch (Exception $e) {
      echo ("Error al borrar".$ex->getMessage());
    }
    return $result;
   }

   function borrarCarta($con, $nombre)
   {
    try {
      $sql= "DELETE FROM cartas WHERE NOMBRE=:nombre";
      $stmt= $con->prepare($sql);
      $stmt->bindParam(":nombre",$nombre);
      $stmt->execute();
      $result= $stmt->rowCount();
    } 
    catch (Exception $e) {
      echo ("Error al borrar".$ex->getMessage());
    }
    return $result;
   }

   //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++MODICAR++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\\

  function modificarMazo($conDb, $nombre, $nombreCam, $desc){
    $result =0;
    try
    {
      $sql = "";
      $arr= array();
      if ($nombreCam != ""){
        $arr[":nombre"] = $nombre;
        $arr[":nombreCam"] = $nombreCam;
        $sql = "UPDATE mazos SET NOMBRE=:nombreCam WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
      }
      if ($desc != ""){
        $arr[":nombre"] = $nombre;
        $arr[":descripcion"] = $desc;
        $sql = "UPDATE mazos SET DESCRIPCION=:descripcion WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion,PDO::PARAM_STR);
      }
      if (count($arr)==3){
        $sql = "UPDATE mazos SET NOMBRE=:nombreCam, DESCRIPCION=:descripcion WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion,PDO::PARAM_STR);
      }
      $stmt->execute($arr);
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en modificarMazo()".$ex->getMessage());
    }
    return $result;
  }

  function modificarCarta($conDb, $nombre, $mazo, $nombreCam, $anio, $imagen)
  {
    $result =0;
    try
    {
      $sql = "";
      $arr= array();
      if ($mazo != ""){
        $arr[":nombre"] = $nombre;
        $arr[":mazo"] = $mazo;
        $sql = "UPDATE cartas SET MAZO=:mazo WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':mazo', $mazo,PDO::PARAM_STR);
      }

      if ($nombreCam != ""){
        $arr[":nombre"] = $nombre;
        $arr[":mazo"] = $mazo;
        $arr[":nombreCam"] = $nombreCam;
        $sql = "UPDATE cartas SET MAZO=:mazo, NOMBRE=:nombreCam WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':mazo', $mazo,PDO::PARAM_STR);
        $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
      }

      if ($anio != ""){
        $arr[":nombre"] = $nombre;
        $arr[":mazo"] = $mazo;
        $arr[":anio"] = $anio;
        $sql = "UPDATE cartas SET MAZO=:mazo, ANIO=:anio WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':mazo', $mazo,PDO::PARAM_STR);
        $stmt->bindParam(':anio', $anio,PDO::PARAM_STR);
      }

      if ($imagen != ""){
        $arr[":nombre"] = $nombre;
        $arr[":mazo"] = $mazo;
        $arr[":imagen"] = $imagen;
        $sql = "UPDATE cartas SET MAZO=:mazo, IMAGEN=:imagen WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':mazo', $mazo,PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen,PDO::PARAM_STR);
      }

      if ($nombreCam != "" && $anio != ""){
        $arr[":nombre"] = $nombre;
        $arr[":mazo"] = $mazo;
        $arr[":nombreCam"] = $nombreCam;
        $arr[":anio"] = $anio;
        $sql = "UPDATE cartas SET MAZO=:mazo, NOMBRE=:nombreCam, ANIO=:anio WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':mazo', $mazo,PDO::PARAM_STR);
        $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
        $stmt->bindParam(':anio', $anio,PDO::PARAM_STR);
      }

      if ($nombreCam != "" && $imagen != ""){
        $arr[":nombre"] = $nombre;
        $arr[":mazo"] = $mazo;
        $arr[":nombreCam"] = $nombreCam;
        $arr[":imagen"] = $imagen;
        $sql = "UPDATE cartas SET MAZO=:mazo, NOMBRE=:nombreCam, IMAGEN=:imagen WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':mazo', $mazo,PDO::PARAM_STR);
        $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen,PDO::PARAM_STR);
      }

      if ($imagen != "" && $anio != ""){
        $arr[":nombre"] = $nombre;
        $arr[":mazo"] = $mazo;
        $arr[":imagen"] = $imagen;
        $arr[":anio"] = $anio;
        $sql = "UPDATE cartas SET MAZO=:mazo, ANIO=:anio, IMAGEN=:imagen WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':mazo', $mazo,PDO::PARAM_STR);
        $stmt->bindParam(':anio', $anio,PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen,PDO::PARAM_STR);
      }

      if (count($arr)==5){
        $sql = "UPDATE cartas SET MAZO=:mazo, NOMBRE=:nombreCam, ANIO=:anio, IMAGEN=:imagen WHERE NOMBRE=:nombre";
        $stmt = $conDb->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':mazo', $mazo,PDO::PARAM_STR);
        $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
        $stmt->bindParam(':anio', $anio,PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen,PDO::PARAM_STR);
      }
      $stmt->execute($arr);
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en modificarMazo()".$ex->getMessage());
    }
    return $result;
  }

?>