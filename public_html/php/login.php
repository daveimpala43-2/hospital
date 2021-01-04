<?php
session_start();
require_once 'db.php';
if( $_POST['pwd'] != "" && $_POST['numReg'] != ""){

    try{
        $pwd = $_POST['pwd'];
        $sql = $conectar->prepare("SELECT pwd FROM faculta WHERE n_registro = :numReg");
        $sql->bindParam(':numReg', $_POST['numReg']);
        $sql->execute();
        $resul = $sql->fetch();
        if(!empty($resul)){
            if(password_verify($pwd,$resul[0])){
                $_SESSION['user'] = $_POST['numReg'];
                echo "1";
            }else{
                echo "2";
            }
        }else{
            echo "2";
        }
        
    }
    catch(\Throwable $th){
        echo "3";
    }

}
else{
    echo "4";
}
