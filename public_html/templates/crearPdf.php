<?php
 // Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
/*
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream(); */

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$folio = $_GET['folio'];
$html = file_get_contents("http://hospital.test/templates/datosPdf.php?folio=".$folio);

$dompdf->loadhtml(utf8_decode($html));

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('comprobante.pdf');