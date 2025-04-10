<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
require "conteudo-pdf.php";
$html = ob_get_clean();

$dompdf->load_html($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();
