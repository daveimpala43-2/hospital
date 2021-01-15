<?php


require_once 'db.php';

if(isset($_POST['type']) && $_POST['type'] == 1){
    $farmaco = new stdClass();
    $id = uniqid();
    try{
        $querry = $conectar->prepare("CALL creat_farma (:id, :nUD ,:nC, :nCl, :com, :ubi, :cP, :toD, :preDo)");
        $querry->bindParam(':id', $id);
        $querry->bindParam(':nC', $_POST['nom_come']);
        $querry->bindParam(':nCl', $_POST['nom_cli']);
        $querry->bindParam(':nUD', $_POST['num_unDo']);
        $querry->bindParam(':com', $_POST['compues']);
        $querry->bindParam(':ubi', $_POST['ubica']);
        $querry->bindParam(':cP', $_POST['cod_prove']);
        $querry->bindParam(':toD', $_POST['total_dosi']);
        $querry->bindParam(':preDo', $_POST['prec_dosis']);
        $result = $querry->execute();
        $querry = null;
        echo "1";
    }
    catch(PDOException $e){
        echo "2";
    }
}

if(isset($_POST['type']) && $_POST['type'] == 2){
    try{
        $querry = $conectar->prepare("CALL up_farma (:id, :nUD ,:nC, :nCl, :com, :ubi, :cP, :toD, :preDo)");
        $querry->bindParam(':id', $_POST['numReg']);
        $querry->bindParam(':nC', $_POST['nom_come']);
        $querry->bindParam(':nCl', $_POST['nom_cli']);
        $querry->bindParam(':nUD', $_POST['num_unDo']);
        $querry->bindParam(':com', $_POST['compues']);
        $querry->bindParam(':ubi', $_POST['ubica']);
        $querry->bindParam(':cP', $_POST['cod_prove']);
        $querry->bindParam(':toD', $_POST['total_dosi']);
        $querry->bindParam(':preDo', $_POST['prec_dosis']);
        $result = $querry->execute();
        $querry = null;
        echo "1";
    }
    catch(PDOException $e){
        echo "2";
    }
}


if(isset($_POST['type']) && $_POST['type'] == 3){
    try{
        echo $sql = "DELETE FROM farmaco WHERE n_registro= '".$_POST['numReg']."'";
        $querry = $conectar->prepare($sql);
        $querry->execute();
        $querry = null;
        echo "1";
    }
    catch(PDOException $e){
        echo "2";
    }
}