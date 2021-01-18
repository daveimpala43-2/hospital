<?php
require_once("../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once(TEMPLATES_PATH . '/head.php');
    ?>
    <link rel="stylesheet" href="../css/styles.css">
    <title>Consultas</title>
</head>

<body>
    <?php
    require_once(TEMPLATES_PATH . '/topbar.php')
    ?>

    <div id="contenido">
        <div class="container gentle-flex">

            <h4>Consultas</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id ingreso</th>
                        <th>Id Doctor</th>
                        <th>Id servicio</th>
                        <th>No. Historial</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Alta</th>
                        <th>Fecha Atención</th>
                        <th>Consumo</th>
                        <th>Observaciones</th>
                        <th>Consulta</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require_once '../php/db.php';
                    $getPaciente = $conectar->prepare("
                    SELECT i.* ,f.nom as fnom, f.ape1 as fape, s.concept as concepto, p.nom as pnom, p.ape1 as pape FROM ingreso as i
                    INNER JOIN faculta as f ON i.id_facul = f.n_registro
                    INNER JOIN servicio as s ON s.id_ser = i.id_ser
                    INNER JOIN paciente AS p On p.num_histo = i.num_histo
                    ");
                    $getPaciente->execute();
                    

                    foreach ($getPaciente as $pac) {
                        echo "<tr>";
                        echo '<td>' . $pac['id_ingreso'] . '</td>';
                        echo '<td>' . $pac['id_facul'] . '</td>';
                        echo '<td>' . $pac['id_ser'] . '</td>';
                        echo '<td>' . $pac['num_histo'] . '</td>';
                        echo '<td>' . $pac['fech_in'] . '</td>';
                        echo '<td>' . $pac['fech_alt'] . '</td>';
                        echo '<td>' . $pac['fech_ate'] . '</td>';
                        echo '<td>' . $pac['consumo_gene'] . '</td>';
                        echo '<td>' . $pac['observa'] . '</td>';
                        echo '<td>
                <button type="button" href="consulta.php?id=' . $pac['id_ingreso'] . '" class="btn btn-warning btn" data-bs-toggle="modal" data-bs-target="#updateS' . $pac['id_ingreso'] . '"><i class="fas fa-eye"></i></button>
                </td>';
                        echo "</tr>";
                        echo '
                        <div class="modal fade" id=updateS' . $pac['id_ingreso'] . ' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="../php/consulta.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar paciente</h5>
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3">
                        <label for="nom" class="form-label">Id Ingreso</label>
                        <input type="text" class="form-control" name="id_ing"  value="' . $pac['id_ingreso'] . '" readonly>
                         </div>
                         <div class="mb-3">
                         <label for="nom" class="form-label">Medico</label>
                         <input type="text" class="form-control"   value="' . $pac['id_facul'] . ' ' . $pac['fnom'] . ' ' . $pac['fape'] . '" readonly>
                          </div>
                          <div class="mb-3">
                          <label for="nom" class="form-label">Paciente</label>
                          <input type="text" class="form-control"   value="' . $pac['num_histo'] . ' ' . $pac['pnom'] . ' ' . $pac['pape'] . '" readonly>
                           </div>
                           <div class="mb-3">
                           <label for="nom" class="form-label">Consumo</label>
                           <input type="text" class="form-control" name="consumo">
                            </div>
                            <div class="mb-3">
                            <label for="nom" class="form-label">Observaciones</label>
                            <input type="text" class="form-control" name="observa">
                             </div>
                             <div class="mb-3" hidden>
                             <input type="text" class="form-control" name="tipo" hidden value="2">
                            </div>
                        

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                        ';
                
                                        echo'
                                       
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        </div>
                        
                        
                        ';
                        
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>


</html>