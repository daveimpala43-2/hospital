<?php
    require_once("../config.php");
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
        <div class="container gentle-flex">
            <div class="card card-paciente">
                <div class="card-body">
                    <h4>Registro de Paciente</h4>
                    <div>
                        <form action="../php/paciente.php" method="POST">
                            <div class="mb-3">
                                <label for="num_histo" class="form-label">Numero de Registro</label>
                                <input type="text" class="form-control" name="num_histo" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nom" aria-describedby="emailHelp">
                            </div>
                            <div class="row">
                                <div class="col col-ms-4">
                                    <label for="ape1" class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="ape1">
                                </div>
                                <div class="col col-ms-4">
                                    <label for="ape2" class="form-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="ape2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-ms-4">
                                    <label for="segSoc" class="form-label">Seguro Social</label>
                                    <input type="text" class="form-control" name="sg">
                                </div>
                                <div class="col col-ms-4">
                                    <label for="fech_na" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fechaN">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="direcc" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="dir">
                            </div>
                            <div class="row">
                                <div class="col col-ms-4">
                                    <label for="telep" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="tel">
                                </div>
                                <div class="col col-ms-4">
                                <label for="telep" class="form-label" hidden>Tipo</label>
                                    <input type="text" class="form-control" value="1" name="tipo" hidden>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary submit"></input>
                        </form>
                    </div>
                </div>
            </div>
            <h4>Lista de pacientes</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>No. Historial</th>
                        <th>Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Seguro Social</th>
                        <th>Dirección</th>
                        <th>Fecha Nacimiento</th>
                        <th>Telefono</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
      
                    <?php
            require_once '../php/db.php';
            $getPaciente = $conectar->prepare("SELECT * from paciente;");
            $getPaciente->execute();
            foreach($getPaciente as $pac){
                echo "<tr>";
                echo '<td>' . $pac['num_histo'] . '</td>';
                echo '<td>' . $pac['nom'] . '</td>';
                echo '<td>' . $pac['ape1'] . '</td>';
                echo '<td>' . $pac['ape2'] . '</td>';
                echo '<td>' . $pac['numSeg'] . '</td>';
                echo '<td>' . $pac['direc'] . '</td>';
                echo '<td>' . $pac['fech_na'] . '</td>';
                echo '<td>' . $pac['telef'] . '</td>';
                echo '<td>
                <button type="button" href="registroPa.php?id=' . $pac['num_histo'] . '" class="btn btn-warning btn" data-bs-toggle="modal" data-bs-target="#updateS'.$pac['num_histo'].'">Actualizar</button>
                </td>';
                echo '<td>
                <button type="button" href="registroPa.php?id=' . $pac['num_histo'] . '" class="btn btn-danger btn" data-bs-toggle="modal" data-bs-target="#deleteS'.$pac['num_histo'].'">Eliminar</button>
                </td>';
                echo "</tr>";
                echo '<div class="modal fade" id=updateS' . $pac['num_histo'] . ' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="../php/paciente.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar paciente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3">
                        <label for="num_reg" class="form-label">No registro</label>
                        <input type="text" class="form-control" name="num_histo" placeholder="Ingresa el numero de registro"  autocomplete="off" value="' . $pac['num_histo'] . '" readonly>
                    </div>
                    <div class="mb-3" hidden>
                        <label for="id_ser" class="form-label">ID Servicio</label>
                        <!-- <input type="text" class="form-control" name="id_ser" placeholder="Ingresa el id del servicio"  autocomplete="off"> -->
                        <select id="id_ser" class="form-control" name="id_ser" > ';
                       
                            require_once '../php/db.php';
                            try {
                                $services = $conectar->prepare("select * from paciente");
                                $services->execute();
                                foreach ($services as $ser) {
                                    if($pac['num_histo']==$ser['num_histo']){
                                        $x="selected";
                                    }else{
                                        $x="";
                                    }
                                   
                                    echo '<option '.$x.' value="' . $ser['id_ser'] . '">' . $ser['concept'] . '</option>';
                                }
                            } catch (\Throwable $th) {
                                echo "ME DA AMSIEDAD";
                            }
                           
                                echo'

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nom"  required autocomplete="off" value="' . $pac['nom'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="appat" class="form-label">Apellido paterno</label>
                        <input type="text" class="form-control" name="ape1"  required autocomplete="off" value="' . $pac['ape1'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="apmat" class="form-label">Apellido materno</label>
                        <input type="text" class="form-control" name="ape2"  required autocomplete="off" value="' . $pac['ape2'] . '">
                    </div>

                    <div class="mb-3">
                        <label for="dir" class="form-label">No. Seguro</label>
                        <input type="text" class="form-control" name="sg"  required autocomplete="off" value="' . $pac['numSeg'] . '">
                    </div>

                    <div class="mb-3">
                        <label for="tel" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="dir"  required autocomplete="off" value="' . $pac['direc'] . '">
                    </div>

                    <div class="mb-3">
                        <label for="pwd" class="form-label">Fecha de nacimiento</label>
                        <input type="text" class="form-control" name="fechaN"  required autocomplete="off" value="' . $pac['fech_na'] . '">
                    </div>

                    
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="tel"  required autocomplete="off" value="' . $pac['telef'] . '">
                    </div>
                        </div>
                        <div class="mb-3" hidden>
                    
                        <input type="text" class="form-control" name="tipo" required autocomplete="off" hidden value="2">
                    </div>
                   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>

               
                <div class="modal fade" id=deleteS' . $pac['num_histo'] . ' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="../php/paciente.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea elminar al siguiente medico?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3">
                        <label for="num_reg" class="form-label">No registro</label>
                        <input type="text" class="form-control" name="num_histo" autocomplete="off" value="' . $pac['num_histo'] . '"readonly>
                    </div>
                        <div class="mb-3">
                        <label for="nom" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nom" p autocomplete="off" value="' . $pac['nom'] . '" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="appat" class="form-label">Apellido paterno</label>
                        <input type="text" class="form-control" name="ape1" autocomplete="off" value="' . $pac['ape1'] . '" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="apmat" class="form-label">Apellido materno</label>
                        <input type="text" class="form-control" name="ape2"  autocomplete="off" value="' . $pac['ape2'] . '" disabled>
                    </div>
                        </div>
                        <div class="mb-3" hidden>
                    
                        <input type="text" class="form-control" name="tipo" required autocomplete="off" hidden value="3">
                    </div>
                   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </div>
                    </div>
                    </form>
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