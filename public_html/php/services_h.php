<?php

require_once 'db.php';

$id_service=$_POST['id_ser'];
$con_service=$_POST['con_ser'];

if( $id_service != "" && $con_service != ""){

   try {
   
    $sql = $conectar->prepare("INSERT INTO servicio VALUES ('".$id_service."','".$con_service."')");
    $sql->execute();
    
    $sql=null; //OJO, ES EXTREMADAMENTE IMPORTANTE IGUALAR LA CONEXION A NULL, PUES AVECES LOS HACKERS RUSOS ESTAN AL ACECHO DE LOS 
              // PROYECTITOS DE LOS ESTUDIANTES DE LA HONORABLE FACULTAD DE ESTUDIOS SUPERIORES CUAUTITLAN.

              /**
               OJO, NO ES NECESARIO CERRAR LA CONEXION PUES USAMOS PDO, ANTES DE QUE ME LA EMPIECEN A SUCCIONAR
               https://es.stackoverflow.com/questions/50083/es-necesario-cerrar-una-conexi%C3%B3n-con-pdo-luego-de-ejecutar-una-sentencia#:~:text=La%20conexi%C3%B3n%20permanecer%C3%A1%20activa%20durante,variable%20que%20contiene%20el%20objeto.
               **/
    header("Location: ../view/services_h.php");
   } catch (\Throwable $th) {
       echo"POR ALGUNA RAZON NO SE PUDO INSERTAR EL REGISTRO, INTENTELO DE NUEVO";
   }
}



?>

