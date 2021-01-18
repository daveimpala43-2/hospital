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
    <title>Ingreso Paciente</title>
</head>

<body>
    <?php
    require_once(TEMPLATES_PATH . '/topbar.php')
    ?>

    <div id="contenido">
        <div class="container gentle-flex">

            <h4>Ingreso de pacientes</h4>
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
                    $getPaciente = $conectar->prepare("SELECT * from ingreso;");
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
                <button type="button" href="registroPa.php?id=' . $pac['num_histo'] . '" class="btn btn-info btn" data-bs-toggle="modal" data-bs-target="#updateS' . $pac['num_histo'] . '"><i class="far fa-hospital"></i></button>
                </td>';
                        echo "</tr>";
                        echo '<div class="modal fade" id=updateS' . $pac['num_histo'] . ' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="../php/Ingreso.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar paciente</h5>
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3">
                        ';

                        require_once '../php/db.php';
                        ///////////////////////////////////
                        try {
                            $numH = $conectar->prepare("SELECT num_histo FROM ingreso WHERE num_histo = $pac[num_histo]");
                            $numH->execute();


                            //Generando codigo
                            $code = uniqid();
                            foreach ($numH as $numHis) {
                               // print_r($numHis);
                             
                            
                                if($numHis['num_histo'] != null){

                                    try {
                                        $alta = $conectar->prepare("SELECT max(fech_alt) as altaT from ingreso WHERE num_histo = $pac[num_histo]");
                                        $alta->execute();
                                            //echo"<br>fechaMax";
            
                                        foreach ($alta as $alt) {
            
                                       // print_r($alt);
                                            if($alt['altaT'] == null){
                                                echo '
                                                <div class="alert alert-danger" role="alert">
                                                Paciente no dado de alta.
                                                </div>
                
                                                ';
                                                //Paciente no dado de alta
                                                $altaTF = 0;
                                            }else{
                                                //Paciente dado de alta
            
                                                $altaTF = 1;
                                            }
                   
                                        }
                                    } catch (\Throwable $th) {
                                        echo "ME DA AMSIEDAD";
                                    }
            
                  
                                }else{
                      //Paciente dado de alta
            
                      $altaTF = 1;

                                }
       
                            }
                        } catch (\Throwable $th) {
                            echo "ME DA AMSIEDAD";
                        }


                        ///////////////////////////////////
                      

                        echo'
  
                        <label for="num_reg" class="form-label">Id de Ingreso</label>
                        <input type="text" class="form-control" name="id_ing" value="'.$code.'" placeholder="Id de ingreso" readonly>
                    </div>
                        <div class="mb-3">
                        <label for="num_reg" class="form-label">Numero de historial</label>
                        <input type="text" class="form-control" name="num_histo" placeholder="Ingresa el numero de registro"  autocomplete="off" value="' . $pac['num_histo'] . '" readonly>
                    </div>
                    ';

                        echo '
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nom"  required autocomplete="off" value="' . $pac['nom'] . '"readonly>
                    </div>
                    <div class="mb-3">
                        <label for="appat" class="form-label">Apellido paterno</label>
                        <input type="text" class="form-control" name="ape1"  required autocomplete="off" value="' . $pac['ape1'] . '"readonly>
                    </div>
                    <div class="mb-3">
                        <label for="apmat" class="form-label">Apellido materno</label>
                        <input type="text" class="form-control" name="ape2"  required autocomplete="off" value="' . $pac['ape2'] . '"readonly>
                    </div>
                    <div class="mb-3">
                                <select name="id_facul" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione un doctor</option>
                        ';
                        require_once '../php/db.php';
                        try {
                            $faculta = $conectar->prepare("select * from faculta");
                            $faculta->execute();
                            foreach ($faculta as $fac) {
                                echo '
                                <option value="' . $fac['n_registro'] . '">' . $fac['n_registro'] . ' Dr. ' . $fac['nom'] . ' ' . $fac['ape1'] . ' ' . $fac['ape2'] . '</option>
                   

                                ';
                            }
                        } catch (\Throwable $th) {
                            echo "ME DA AMSIEDAD";
                        }
                        echo '
                                </select>
                                </div>
                                <div class="mb-3">
                                <select name="id_ser" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione un servicio</option>
                                ';
                        require_once '../php/db.php';
                        try {
                            $servicio = $conectar->prepare("select * from servicio");
                            $servicio->execute();
                            foreach ($servicio as $ser) {
                                echo '
                                        <option value="' . $ser['id_ser'] . '">' . $ser['id_ser'] . ' ' . $ser['concept'] . '</option>
                               
                                        ';
                            }
                        } catch (\Throwable $th) {
                            echo "ME DA AMSIEDAD";
                        }

                        echo '
                                </select>
                                </div>
                                <div class="mb-3">
                                <label for="fech_na" class="form-label">Fecha de Ingreso</label>
                                <input type="date" class="form-control" name="fechaI">
                                </div>
                                <div class="mb-3">
                                <label for="fech_na" class="form-label">Fecha de Atención</label>
                                <input type="date" class="form-control" name="fechaT">
                                </div>
        
            
                                    </div>
                                    <div class="mb-3" hidden>
                                
                                    <input type="text" class="form-control" name="tipo" required autocomplete="off" hidden value="1">
                                </div>
                               
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary"
                                        ';
                                        if($altaTF == 0){
                                            echo'disabled';
                                        }
                                        echo'
                                        >Ingresar</button>
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        
                        ';
                        $altaTF = 1;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>


</html>