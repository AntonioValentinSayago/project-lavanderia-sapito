<?php 

require_once '../../../mdpdf/vendor/autoload.php';
require_once 'ejemplo.php';

$fecha = $_POST['fecha'];

echo $fecha;
// $mysqli= new mysqli("localhost","u551598332_root","#iSmT:[>8","u551598332_lavanderia_sap");
// $mysqli->set_charset("utf8");
// $consulta=$mysqli->prepare("SELECT * from ctl_historial WHERE fecha_entrega = '$fecha'");
// $consulta->execute();
// $resultados=$consulta->get_result();
// $productos=array();
// while($row=$resultados->fetch_assoc()) $productos[]=$row;
// $mysqli->close();



// $mpdf = new \Mpdf\Mpdf();
// $css = file_get_contents("../../style.css");

// $plantilla = getPlantilla($productos);
// $mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
// $mpdf->writeHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY); 
// $mpdf->setFooter('{PAGENO}/{nbpg}');

// $mpdf->Output("miarchivopdf","I");

?>