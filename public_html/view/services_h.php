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
        Registro de servicios
    </title>
</head>

<body>
    <?php
    require_once(TEMPLATES_PATH . '/topbar.php')
    ?>
    <div id="alta_servicios">
        <div class="container gentle-flex">
            <div class="card card-paciente">
                <div class="card-body">
                    <h4>Registro de Servicios</h4>
                    <div>
                        <form action="../php/services_h.php" method="POST">
                            <div class="mb-3">
                                <label for="id_ser" class="form-label">Id de servicio</label>
                                <input type="text" class="form-control" name="id_ser" placeholder="Ingresa el id del servicio" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="con_ser" class="form-label">Concepto</label>
                                <input type="text" class="form-control" name="con_ser" placeholder="Ingresa el concepto del servicio" required autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary submit">Ingresar.</button>
                        </form>

                        
                    </div>
                    
                </div>
                <table class="table_services table-borderless">
                            <thead>
                                <tr>

                                    <th scope="col">ID </th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require_once '../php/db.php';
                                $getServices = $conectar->prepare("select * from servicio");
                                $getServices->execute();

                                foreach ($getServices as $ser) {
                                    echo "<tr>";
                                    echo '<td class="tds">' . $ser['id_ser'] . '</td>';
                                    echo '<td class="tds">' . $ser['concept'] . '</td>';
                                    echo ' <td class="tds">
                                        <button type="button" class="btn btn-warning btns_s" data-bs-toggle="modal" data-bs-target="#updateS"><i class="fas fa-edit"></i> </button>
                                        <button type="button" class="btn btn-danger btns_s" data-toggle="modal"><i class="fas fa-trash"></i> </button>
                                    
                                    </td>';
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar servicios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_ser" class="form-label">Id de servicio</label>
                        <input type="text" class="form-control" name="id_ser" placeholder="Ingresa el id del servicio" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="con_ser" class="form-label">Concepto</label>
                        <input type="text" class="form-control" name="con_ser" placeholder="Ingresa el concepto del servicio" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>




</body>



</html>