<?php

require_once 'db.php';

$num_reg=$_POST['num_reg'];
$id_service=$_POST['id_ser'];
$name=$_POST['nom'];
$appat=$_POST['appat'];
$apmat=$_POST['apmat'];
$dir=$_POST['dir'];
$tel=$_POST['tel'];
$pwd=$_POST['pwd'];
$tipo=$_POST['tipo'];


if ($tipo==1){

if( $id_service != "" && $num_reg != ""&& $name != ""&& $appat != ""&& $apmat != ""&& $dir != ""&& $tel != ""&& $pwd != ""){

   try {
   
    $sql = $conectar->prepare("INSERT INTO faculta VALUES ('".$num_reg."','".$id_service."','".$name."','".$appat."','".$apmat."','".$dir."','".$tel."','".$pwd."'   )     ");
    $sql->execute();
    
    $sql=null; 

            
    header("Location: ../view/faculta_h.php");
   } catch (\Throwable $th) {
       echo"POR ALGUNA RAZON NO SE PUDO INSERTAR EL REGISTRO, INTENTELO DE NUEVO";
   }
}

}else if($tipo==2){
    if( $id_service != "" && $num_reg != ""&& $name != ""&& $appat != ""&& $apmat != ""&& $dir != ""&& $tel != ""&& $pwd != ""){

        try {
        
         $sql = $conectar->prepare("UPDATE faculta  SET id_ser = '".$id_service."', nom='".$name."', ape1='".$appat."', ape2='".$apmat."', direc='".$dir."', telef='".$tel."', pwd='".$pwd."'    WHERE n_registro=".$num_reg."");
         
         $sql->execute();
         
         $sql=null; 
                   
     
         header("Location: ../view/faculta_h.php");
        } catch (\Throwable $th) {
            echo"POR ALGUNA RAZON NO SE PUDO ACTUALIZAR EL REGISTRO, INTENTELO DE NUEVO";
        }
     }

}elseif($tipo==3){

    if( $num_reg != ""){

        try {
        
         $sql = $conectar->prepare("DELETE FROM faculta WHERE n_registro=".$num_reg);
         
         $sql->execute();
         
         $sql=null; 
                   
     
         header("Location: ../view/faculta_h.php");
        } catch (\Throwable $th) {
            echo"POR ALGUNA RAZON NO SE PUDO ELMINAR EL REGISTRO, INTENTELO DE NUEVO";
        }
     }
}

else{
    echo"ERROR 404"; 
}
