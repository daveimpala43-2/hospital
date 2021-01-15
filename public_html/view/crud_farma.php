<?php
    require_once("../config.php");
    require_once('../php/db.php');
    try{
        $query = $conectar->prepare("Call read_farma()");
        $query->execute();
        
    }catch(PDOException $e){
        echo "2";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once(TEMPLATES_PATH.'/head.php');
    ?>
    <link rel="stylesheet" href="../css/styles.css">
    <title>Inicio</title>
</head>

<body>
    <?php
        require_once(TEMPLATES_PATH.'/topbar.php')
    ?>

<div id="contenido">
    <div class="container gentle-flex tableFarma" >
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Farmaco</button>
    <table id="crudFarma" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Num. Registro</th>
            <th>Nom. Comercial</th>
            <th>Nom. Clinico</th>
            <th>Num. de UnDosis</th>
            <th>Ubicacion</th>
            <th>Dosis Total</th>
            <th>Precio Dosis</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($query as $res){
            $datosU = "'".$res[2]."','".$res[3]."','".$res[1]."','".$res[4]."','".$res[5]."','".$res[6]."','".$res[7]."','".$res[8]."','".$res[0]."'";
            $datosD = "'".$res[2]."','".$res[3]."','".$res[0]."'";
            echo '<tr>';
            echo '<th>'.$res[0].'</th>';
            echo '<th>'.$res[2].'</th>';
            echo '<th>'.$res[3].'</th>';
            echo '<th>'.$res[1].'</th>';
            echo '<th>'.$res[5].'</th>';
            echo '<th>'.$res[7].'</th>';
            echo '<th>'.$res[8].'</th>';
            echo '<th> <button class="btn btn-warning" onclick="datosFarma('.$datosU.')">Actualizar</button> </th>';
            echo '<th> <button class="btn btn-danger" onclick="delFarma('.$datosD.')" >Eliminar</button> </th>';
            echo '</tr>';
        } ?>
    </tbody>
    </table>
    </div>
</div>


<!-- Modales -->
<?php
        require_once(TEMPLATES_PATH.'/farmaco/delete.php');
        require_once(TEMPLATES_PATH.'/farmaco/update.php');
        require_once(TEMPLATES_PATH.'/farmaco/create.php');
?>
</body>

</html>