<?php

require_once 'db.php';

$id_service=$_POST['id_ser'];
$con_service=$_POST['con_ser'];
$tipo=$_POST['tipo'];


if ($tipo==1){

if( $id_service != "" && $con_service != ""){

   try {
   
    $sql = $conectar->prepare("INSERT INTO servicio VALUES ('".$id_service."','".$con_service."')");
    $sql->execute();
    
    $sql=null; 

            
    header("Location: ../view/services_h.php");
   } catch (\Throwable $th) {
       echo"POR ALGUNA RAZON NO SE PUDO INSERTAR EL REGISTRO, INTENTELO DE NUEVO";
   }
}

}else if($tipo==2){
    if( $id_service != "" && $con_service != ""){

        try {
        
         $sql = $conectar->prepare("UPDATE servicio  SET concept = '".$con_service."'  WHERE id_ser=".$id_service."");
         
         $sql->execute();
         
         $sql=null; 
                   
     
         header("Location: ../view/services_h.php");
        } catch (\Throwable $th) {
            echo"POR ALGUNA RAZON NO SE PUDO ACTUALIZAR EL REGISTRO, INTENTELO DE NUEVO";
        }
     }

}elseif($tipo==3){

    if( $id_service != ""){

        try {
        
         $sql = $conectar->prepare("DELETE FROM servicio WHERE id_ser=".$id_service);
         
         $sql->execute();
         
         $sql=null; 
                   
     
         header("Location: ../view/services_h.php");
        } catch (\Throwable $th) {
            echo"POR ALGUNA RAZON NO SE PUDO ELMINAR EL REGISTRO, INTENTELO DE NUEVO";
        }
     }
}

else{
    echo"ERROR 404"; 
}
