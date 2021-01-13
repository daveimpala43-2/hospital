<?php

require_once "../config.php";

try {
    $conectar = new PDO("mysql:host=" . SERVER . ";dbname=" . DB . "", "" . USER . "", "" . PASS . "");

  } catch (\Throwable $th) {
    echo "Error al cargar la base de datos :'c";
}