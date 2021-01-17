<?php

require_once 'db.php';

echo $num_histo=$_POST['num_histo'];
echo $name=$_POST['nom'];
echo $appat=$_POST['ape1'];
echo $apmat=$_POST['ape2'];
echo $sg=$_POST['sg'];
echo $dir=$_POST['dir'];
echo $fechaN=$_POST['fechaN'];
echo $tel=$_POST['tel'];
echo $tip=$_POST['tipo'];

if( $num_histo != "" &&  $name != "" && $appat != "" && $apmat != "" && $sg != "" && $dir != "" && $fechaN != "" && $tel != "" && $tip == 1){

    try {
    
     $sql = $conectar->prepare("INSERT INTO paciente VALUES ('".$num_histo."','".$name."','".$appat."','".$apmat."','".$sg."','".$dir."','".$fechaN."','".$tel."'   )     ");
     $sql->execute();
     
     $sql=null; 
 
             
     header("Location: ../view/registroPa.php");
    } catch (\Throwable $th) {
        echo"POR ALGUNA RAZON NO SE PUDO INSERTAR EL REGISTRO, INTENTELO DE NUEVO";
    }
 }else if( $num_histo != "" && $tip == 2){

    if( $num_histo != "" &&  $name != "" && $appat != "" && $apmat != "" && $sg != "" && $dir != "" && $fechaN != "" && $tel != ""){

        try {
           // echo"<br>Esto es del numero 2 + IF<br>";
         $sql = $conectar->prepare("UPDATE paciente  SET nom ='".$name."', ape1='".$appat."', ape2='".$apmat."', numSeg='".$sg."', direc='".$dir."', fech_na='".$fechaN."', telef='".$tel."' WHERE num_histo=".$num_histo."");
         
         $sql->execute();
         
         $sql=null; 
                   
     
         header("Location: ../view/registroPa.php");
        } catch (\Throwable $th) {
            echo"POR ALGUNA RAZON NO SE PUDO ACTUALIZAR EL REGISTRO, INTENTELO DE NUEVO";
        }
     }

 }else if( $num_histo != "" && $tip == 3){

    if( $num_histo != ""){

        try {
        
         $sql = $conectar->prepare("DELETE FROM paciente WHERE num_histo=".$num_histo);
         
         $sql->execute();
         
         $sql=null; 
                   
     
         header("Location: ../view/registroPa.php");
        } catch (\Throwable $th) {
            echo"POR ALGUNA RAZON NO SE PUDO ELMINAR EL REGISTRO, INTENTELO DE NUEVO";
        }
     }
 }



?>