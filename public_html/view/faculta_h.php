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
    <title>
        Registro de facultativos
    </title>
</head>

<body>
    <?php
    require_once(TEMPLATES_PATH . '/topbar.php')
    ?>
    <div id="alta_facultativos">
        <div class="container gentle-flex">
            <div class="card card-paciente">
                <div class="card-body">
                    <h4>Registro de Facultativos</h4>
                    <div>
                        <form action="../php/faculta_h.php" method="POST">
                            <div class="mb-3">
                                <label for="num_reg" class="form-label">No registro</label>
                                <input type="text" class="form-control" name="num_reg" placeholder="Ingresa el numero de registro" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="id_ser" class="form-label">ID Servicio</label>
                                <!-- <input type="text" class="form-control" name="id_ser" placeholder="Ingresa el id del servicio" required autocomplete="off"> -->
                                <select id="id_ser" class="form-control" name="id_ser" required>
                                    <?php
                                    require_once '../php/db.php';
                                    try {
                                        $services = $conectar->prepare("select * from servicio");
                                        $services->execute();
                                        foreach ($services as $ser) {

                                            echo '<option value="' . $ser['id_ser'] . '">' . $ser['concept'] . '</option>';
                                        }
                                    } catch (\Throwable $th) {
                                        echo "ME DA AMSIEDAD";
                                    }
                                    ?>


                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nom" placeholder="Ingresa el nombre del medico" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="appat" class="form-label">Apellido paterno</label>
                                <input type="text" class="form-control" name="appat" placeholder="Ingresa el primer appelido del medico" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="apmat" class="form-label">Apellido materno</label>
                                <input type="text" class="form-control" name="apmat" placeholder="Ingresa el segundo apellido del medico" required autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="dir" class="form-label">Direccion</label>
                                <input type="text" class="form-control" name="dir" placeholder="Ingresa la direccion del medico" required autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="tel" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="tel" placeholder="Ingresa el telefono del medico" required autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="pwd" class="form-label">Contraseña</label>
                                <input type="text" class="form-control" name="pwd" placeholder="Ingresa la contraseña del medico" required autocomplete="off">
                            </div>

                            <div class="mb-3" hidden>

                                <input type="text" class="form-control" name="tipo" required autocomplete="off" hidden value="1">
                            </div>
                            <button type="submit" class="btn btn-primary submit">Ingresar.</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table_faculta table-borderless">
        <thead>
            <tr>

                <th scope="col">N. registro </th>
                <th scope="col">Servicio</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido paterno</th>
                <th scope="col">Apellido materno</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            require_once '../php/db.php';
            $getFaculta = $conectar->prepare("SELECT * from faculta INNER JOIN servicio on faculta.id_ser=servicio.id_ser");
            $getFaculta->execute();

            foreach ($getFaculta as $fac) {
                echo "<tr>";
                echo '<td class="tds2">' . $fac['n_registro'] . '</td>';
                echo '<td class="tds2">' .$fac['id_ser']."-". $fac['concept'] . '</td>';
                echo '<td class="tds2">' . $fac['nom'] . '</td>';
                echo '<td class="tds2">' . $fac['ape1'] . '</td>';
                echo '<td class="tds2">' . $fac['ape2'] . '</td>';
                echo '<td class="tds2">' . $fac['direc'] . '</td>';
                echo '<td class="tds2">' . $fac['telef'] . '</td>';
                echo " <td class='tds2'>
                                        <button type='button' href='faculta_h.php?id=" . $fac['n_registro'] . "' class='btn btn-warning btns_s' data-bs-toggle='modal' data-bs-target='#updateS" .$fac['n_registro'] . "'><i class='fas fa-edit'></i> </button>
                                        <button type='button' href='faculta_h.php?id=" . $fac['n_registro'] . "' class='btn btn-danger btns_s'  data-bs-toggle='modal' data-bs-target='#deleteS" . $fac['n_registro']. "'><i class='fas fa-trash'></i> </button>
                                    
                                    </td>";
                echo "</tr>";

                echo '<div class="modal fade" id=updateS' . $fac['n_registro'] . ' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="../php/faculta_h.php" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar medico</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                    <label for="num_reg" class="form-label">No registro</label>
                                    <input type="text" class="form-control" name="num_reg" placeholder="Ingresa el numero de registro" required autocomplete="off" value="' . $fac['n_registro'] . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="id_ser" class="form-label">ID Servicio</label>
                                    <!-- <input type="text" class="form-control" name="id_ser" placeholder="Ingresa el id del servicio" required autocomplete="off"> -->
                                    <select id="id_ser" class="form-control" name="id_ser" required> ';
                                   
                                        require_once '../php/db.php';
                                        try {
                                            $services = $conectar->prepare("select * from servicio");
                                            $services->execute();
                                            foreach ($services as $ser) {
                                                if($fac['id_ser']==$ser['id_ser']){
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
                                    <input type="text" class="form-control" name="nom" placeholder="Ingresa el nombre del medico" required autocomplete="off" value="' . $fac['nom'] . '">
                                </div>
                                <div class="mb-3">
                                    <label for="appat" class="form-label">Apellido paterno</label>
                                    <input type="text" class="form-control" name="appat" placeholder="Ingresa el primer appelido del medico" required autocomplete="off" value="' . $fac['ape1'] . '">
                                </div>
                                <div class="mb-3">
                                    <label for="apmat" class="form-label">Apellido materno</label>
                                    <input type="text" class="form-control" name="apmat" placeholder="Ingresa el segundo apellido del medico" required autocomplete="off" value="' . $fac['ape2'] . '">
                                </div>
    
                                <div class="mb-3">
                                    <label for="dir" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" name="dir" placeholder="Ingresa la direccion del medico" required autocomplete="off" value="' . $fac['direc'] . '">
                                </div>
    
                                <div class="mb-3">
                                    <label for="tel" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="tel" placeholder="Ingresa el telefono del medico" required autocomplete="off" value="' . $fac['telef'] . '">
                                </div>
    
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Contraseña</label>
                                    <input type="text" class="form-control" name="pwd" placeholder="Ingresa la contraseña del medico" required autocomplete="off" value="' . $fac['pwd'] . '">
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

                           
                            <div class="modal fade" id=deleteS' . $fac['n_registro'] . ' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="../php/faculta_h.php" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea elminar al siguiente medico?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                    <label for="num_reg" class="form-label">No registro</label>
                                    <input type="text" class="form-control" name="num_reg" placeholder="Ingresa el numero de registro" required autocomplete="off" value="' . $fac['n_registro'] . '"readonly>
                                </div>
                                    <div class="mb-3">
                                    <label for="nom" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Ingresa el nombre del medico" required autocomplete="off" value="' . $fac['nom'] . '" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="appat" class="form-label">Apellido paterno</label>
                                    <input type="text" class="form-control" name="appat" placeholder="Ingresa el primer appelido del medico" required autocomplete="off" value="' . $fac['ape1'] . '" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="apmat" class="form-label">Apellido materno</label>
                                    <input type="text" class="form-control" name="apmat" placeholder="Ingresa el segundo apellido del medico" required autocomplete="off" value="' . $fac['ape2'] . '" disabled>
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


</body>

</html>