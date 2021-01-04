<?php
    require_once("config.php");
    require_once('php/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once(TEMPLATES_PATH.'/head.php');
    ?>
    <title>Inicio</title>
</head>

<body>
    <?php
        require_once(TEMPLATES_PATH.'/topbar.php')
    ?>

    <div class="container gentle-flex">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="num_reg">Numero de registro</label>
                        <input type="text" name="num_reg" id="num_reg" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>