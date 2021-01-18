<?php

require_once 'db.php';

 $id_ing=$_POST['id_ing'];
 $id_ser=$_POST['id_ser'];
 $id_facul=$_POST['id_facul'];
 $num_histo=$_POST['num_histo'];
 $fechaI=$_POST['fechaI'];
 $fechaT=$_POST['fechaT'];
 $fechaAl=$_POST['fechaAl'];
 $consumo=$_POST['consumo'];
 $observa=$_POST['observa'];
 $tip=$_POST['tipo'];

if( $id_ing != "" && $id_ser != "" && $id_facul != "" && $num_histo != "" && $fechaI != "" && $fechaT != "" && $tip == 1){

    try {

     $sql = $conectar->prepare("INSERT INTO ingreso (id_ingreso, id_facul, id_ser, num_histo, fech_in, fech_ate)VALUES ('".$id_ing."','".$id_facul."','".$id_ser."','".$num_histo."','".$fechaI."','".$fechaT."')");
     $sql->execute();

     $sql=null; 

             
     header("Location: ../view/IngresoPa.php");
    } catch (\Throwable $th) {
        echo"POR ALGUNA RAZON NO SE PUDO INSERTAR EL REGISTRO, INTENTELO DE NUEVO";
        echo"Hola";
        exit();
    }
 }else if( $id_ing != "" && $consumo != "" && $observa != ""  && $tip == 2){

    if($id_ing != "" && $consumo != "" && $observa != ""){

        try {
           // echo"<br>Esto es del numero 2 + IF<br>";
         $sql = $conectar->prepare("UPDATE ingreso  SET consumo_gene ='".$consumo."', observa='".$observa."' WHERE id_ingreso=".$id_ing."");
         
         $sql->execute();
         
         $sql=null; 
                   
     
         header("Location: ../view/AltaPa.php");
        } catch (\Throwable $th) {
            echo"POR ALGUNA RAZON NO SE PUDO ACTUALIZAR EL REGISTRO, INTENTELO DE NUEVO";
        }
     }

 }

/**SELECT i.id_ingreso, i.id_facul, i.id_ser, i.num_histo, i.fech_in, i.fech_alt, i.fech_ate, i.consumo_gene, i.observa, f.n_registro ,f.nom, s.concept FROM ingreso as i
INNER JOIN faculta as f ON i.id_facul = f.n_registro
INNER JOIN servicio as s ON s.id_ser = i.id_ser */
?>