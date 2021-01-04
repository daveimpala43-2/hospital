<?php
    define("SERVER", "localhost");
    define("USER","root");
    define("PASS","Dave4578");
    define("DB","hospital");
    defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
    
    ini_set("error_reporting", "true");
    error_reporting(E_ALL|E_STRCT);
?>