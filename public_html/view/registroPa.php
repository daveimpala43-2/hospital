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
                    <div class="mb-3">
                      <label for="nom" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="nom" aria-describedby="emailHelp">
                    </div>
                    <div class="row">
                        <div class="col col-ms-4">
                          <label for="ape1" class="form-label">Apellido Paterno</label>
                          <input type="text" class="form-control" id="ape1">
                        </div>
                        <div class="col col-ms-4">
                          <label for="ape2" class="form-label">Apellido Materno</label>
                          <input type="text" class="form-control" id="ape2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-ms-4">
                          <label for="segSoc" class="form-label">Seguro Social</label>
                          <input type="text" class="form-control" id="segSoc">
                        </div>
                        <div class="col col-ms-4">
                          <label for="fech_na" class="form-label">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" id="fech_na">
                        </div>
                    </div>
                    <div class="mb-3">
                          <label for="direcc" class="form-label">Dirección</label>
                          <input type="text" class="form-control" id="direcc">
                        </div>
                    <div class="row">
                        <div class="col col-ms-4">
                          <label for="telep" class="form-label">Telefono</label>
                          <input type="text" class="form-control" id="telep">
                        </div>
                        <div class="col col-ms-4">

                        </div>
                    </div>
                    <button type="button" class="btn btn-primary submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>


</html>