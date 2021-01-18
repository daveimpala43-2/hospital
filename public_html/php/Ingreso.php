<?php

require_once 'db.php';

echo "<br>". $id_ing=$_POST['id_ing'];
echo "<br>". $id_ser=$_POST['id_ser'];
echo "<br>". $id_facul=$_POST['id_facul'];
echo "<br>". $num_histo=$_POST['num_histo'];
echo "<br>". $fechaI=$_POST['fechaI'];
echo "<br>". $fechaT=$_POST['fechaT'];
echo "<br>". $tip=$_POST['tipo'];

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
 }else{}


?>