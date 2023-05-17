<?php 

require_once '../../mdpdf/vendor/autoload.php';
require_once 'ejemplo.php';
require_once 'consulta.php';

$mpdf = new \Mpdf\Mpdf();
$css = file_get_contents("../style.css");

$plantilla = getPlantilla($productos);
$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY); 
$mpdf->setFooter('{PAGENO}/{nbpg}');

$mpdf->Output("miarchivopdf","I");

?>