<?php
    require_once("../config.php");
    require_once('../php/db.php');
    try{
        $sql = "SELECT ing.id_ingreso, far.precio_dosis, far.n_registro, far.nom_clin, far.num_undosis, con.fech_farm, con.folio FROM consumen con, ingreso ing, farmaco far WHERE con.id_farma=far.n_registro && con.id_ingre = ing.id_ingreso";
        $query = $conectar->prepare($sql);
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
    <a class="btn btn-warning" href="/templates/crearPdf.php?folio='.$datosU.' ">Imprimir Registro</a>
    <table id="crudFarma" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Numero de Ingreso</th>
            <th>N° Registro Farmaco</th>
            <th>Nom. Clinico</th>
            <th>Num. de UnDosis</th>
            <th>Fecha suministrada</th>
            <th>Precio de la dosis</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($query as $res){
            $datosU = $res[6];
            echo '<tr>';
            echo '<th>'.$res[0].'</th>';
            echo '<th>'.$res[2].'</th>';
            echo '<th>'.$res[3].'</th>';
            echo '<th>'.$res[4].'</th>';
            echo '<th>'.$res[5].'</th>';
            echo '<th>'.$res[1].'</th>';
            echo '</tr>';
        } ?>
    </tbody>
    </table>
    </div>
</div>


<script>

$(document).ready( function () {
    $('#crudFarma').DataTable({
        "language": {
            "lengthMenu": "Mostar _MENU_ farmacos en la pantallas",
            "zeroRecords": "Nothing found - sorry",
            "info": "Esta en la page _PAGE_ de _PAGES_",
            "infoEmpty": "No hay informacion",
            "paginate":{
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "search": "Buscar"
        }
    });
    } );

</script>

</body>

</html>