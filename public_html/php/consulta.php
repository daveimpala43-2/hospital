<?php

require_once 'db.php';

echo $id_ing=$_POST['id_ing'];


if($_POST['consumo'] == ""){
   echo $_POST['consumo'] = "Sin consumo";
} 

if( $_POST['observa'] == ""){
    echo $_POST['observa'] = "Sin comentarios";
}

if( isset($_POST['observa'])&& isset($_POST['consumo'])){
    echo  $observa=$_POST['observa'];
    echo   $consumo = $_POST['consumo'];
}

echo $tip=$_POST['tipo'];
 
if( $id_ing != "" && $tip == 2){

    if($id_ing != ""){

        try {
            echo"<br>Esto es del numero 2 + IF<br>";
        
         $sql = $conectar->prepare("UPDATE ingreso  SET consumo_gene ='".$consumo."', observa='".$observa."' WHERE id_ingreso=".$id_ing."");
         
         $sql->execute();
         
         $sql=null; 
                   
     
         header("Location: ../view/AltaPa.php");
        } catch (\Throwable $th) {
            echo"POR ALGUNA RAZON NO SE PUDO ACTUALIZAR EL REGISTRO, INTENTELO DE NUEVO";
        }
     }
 }else{

 }

/**SELECT i.id_ingreso, i.id_facul, i.id_ser, i.num_histo, i.fech_in, i.fech_alt, i.fech_ate, i.consumo_gene, i.observa, f.n_registro ,f.nom, s.concept FROM ingreso as i
INNER JOIN faculta as f ON i.id_facul = f.n_registro
INNER JOIN servicio as s ON s.id_ser = i.id_ser */
?>