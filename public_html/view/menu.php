<?php
    require_once("../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once(TEMPLATES_PATH.'/head.php');
    ?>
    <link rel="stylesheet" href="../css/styMenu.css">
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
                <h4>Bienvenido al sistema</h4>
                <h5><?php echo $_SESSION['nameUser'] ?></h5>
            </div>
        </div>
    </div>
</div>
</body>


</html>