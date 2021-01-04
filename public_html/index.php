<?php
    require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once(TEMPLATES_PATH.'/head.php');
    ?>
    <link rel="stylesheet" href="css/styles.css">
    <title>Inicio</title>
</head>

<body>
    <?php
        require_once(TEMPLATES_PATH.'/topbar.php')
    ?>

<div id="contenido">
    <div class="container gentle-flex">
        <div class="card">
            <div class="card-body">
                <h4>Ingresar al sistema</h4>
                <div>
                    <div class="form-group">
                        <label for="num_reg">Numero de registro</label>
                        <input type="text" name="num_reg" id="num_reg" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña</label>
                        <input type="password" name="pwd" id="pwd" class="form-control">
                    </div>
                    <div class="submit">
                        <button class="btn btn-primary btn-largo" id="login">Ingresar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>


<script src="js/login.js"></script>

</html>