<?php
    require_once("../config.php");
    require_once('../php/db.php');
    $total = 0;
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    try{
        $sql = "SELECT ing.id_ingreso, far.precio_dosis, far.n_registro, far.nom_clin, far.num_undosis, con.fech_farm, con.folio FROM consumen con, ingreso ing, farmaco far WHERE con.id_farma=far.n_registro && con.id_ingre = ing.id_ingreso";
        $query = $conectar->prepare($sql);
        $query->execute();
        
    }catch(PDOException $e){
        echo "2";
    }
?>
<html>
<head>
    <title>Consumo</title>
</head>
<body>
<style>
    table {
        border-collapse: collapse;
}
 th {
  background: #ccc;
}

th, td {
  border: 1px solid #ccc;
  padding: 8px;
}

tr:nth-child(even) {
  background: #efefef;
}

tr:hover {
  background: #d1d1d1;
}
.page-break{
    page-break-before: always;
}
</style>
<table>
     <tr>
         <th>Folio</th>
         <th>Numero de Ingreso</th>
         <th>Num. Registro Farmaco</th>
         <th>Nom. Clinico</th>
         <th>Num. de UnDosis</th>
         <th>Fecha suministrada</th>
         <th>Precio de la dosis</th>
     </tr>
     <?php
        foreach($query as $res){
            $total = $total + $res[1];
            echo '<tr>';
            echo '<td>'.$res[6].'</td>';
            echo '<td>'.$res[0].'</td>';
            echo '<td>'.$res[2].'</td>';
            echo '<td>'.$res[3].'</td>';
            echo '<td>'.$res[4].'</td>';
            echo '<td>'.$res[5].'</td>';
            echo '<td>'.$res[1].'</td>';
            echo '</tr>';
        } ?>
</table>
<hr>
<h3> <strong> Total: <?php echo  '$'.$total ?> </strong> </h3>
</body>
</html>