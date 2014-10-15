<?php
require_once("dompdf/dompdf_config.inc.php");

$file = "folder/type.html"; 

$dompdf = new DOMPDF();
$dompdf->load_html_file($file);
$dompdf->render();
$output = $dompdf->output();
file_put_contents('pdf/type.pdf', $output);

$dompdf->stream("type.pdf");

unlink($file);


?>