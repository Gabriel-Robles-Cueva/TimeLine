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
      $sql= "INSERT INTO cartas(MAZO, NOMBRE, AÑO, IMAGEN) VALUES (:MAZO,:NOMBRE,:AÑO,:IMAGEN)";
      $stmt= $con->prepare($sql);
      $stmt->bindParam(':MAZO', $mazo);
      $stmt->bindParam(':NOMBRE', $nombre);
      $stmt->bindParam(':AÑO', $anio);
      $stmt->bindParam(':IMAGEN', $img);
      $stmt->execute();
    } catch (Exception $ex) {
      echo ("Error al crear".$ex->getMessage());
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

   //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++MODICAR++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\\

  function modificarMazo($conDb, $nombre, $nombreCam, $desc)
  {
    $result =0;
    try
    {
      $sql = "UPDATE mazos SET NOMBRE=:nombreCam, DESCRIPCION=:descripcion WHERE NOMBRE=:nombre";

      $stmt = $conDb->prepare($sql);
      $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
      $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
      $stmt->bindParam(':descripcion', $desc,PDO::PARAM_STR);
      
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en modificarMazo()".$ex->getMessage());
    }
    return $result;
  }

  function modificarMazoNombre($conDb, $nombre, $nombreCam)
  {
    $result =0;
    try
    {
      $sql = "UPDATE mazos SET NOMBRE=:nombreCam WHERE NOMBRE=:nombre";

      $stmt = $conDb->prepare($sql);
      $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
      $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
      
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en modificarMazo()".$ex->getMessage());
    }
    return $result;
  }

  function modificarMazoDesc($conDb, $nombre, $desc)
  {
    $result =0;
    try
    {
      $sql = "UPDATE mazos SET DESCRIPCION=:descripcion WHERE NOMBRE=:nombre";

      $stmt = $conDb->prepare($sql);
      $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
      $stmt->bindParam(':descripcion', $desc,PDO::PARAM_STR);
      
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en modificarMazo()".$ex->getMessage());
    }
    return $result;
  }


  /*function modificarMazo2($conDb, $nombre, $nombreCam, $desc){
    $result =0;
    try
    {
      $sql = "";
      if ($nombreCam != ""){
        $arr[":nombreCam"] = $nombreCam;
        $sql = "UPDATE mazos SET NOMBRE=:nombreCam WHERE NOMBRE=:nombre";
      }
      if ($desc != ""){
        $arr[":desc"] = $desc;
        $sql = "UPDATE mazos SET DESCRIPCION=:descripcion WHERE NOMBRE=:nombre";
      }
      if (count($arr)==2){
        $sql = "UPDATE mazos SET NOMBRE=:nombreCam, DESCRIPCION=:descripcion WHERE NOMBRE=:nombre";
      }
      $stmt = $conDb->prepare($sql);
      $stmt->bindParam(':nombre', $nombre,PDO::PARAM_STR);
      $stmt->bindParam(':nombreCam', $nombreCam,PDO::PARAM_STR);
      $stmt->bindParam(':descripcion', $desc,PDO::PARAM_STR);
      
      $stmt->execute();
      $result = $stmt->rowCount();
     }
    catch (PDOException $ex)
    {
      echo ("Error en modificarMazo()".$ex->getMessage());
    }
    return $result;
  }*/

?>