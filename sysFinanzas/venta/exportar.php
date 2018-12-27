<?php
require_once 'pdf/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "ejemplo.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
