<style>

</style>
<?php
require_once("../config/db_config.php");
$consulta = "SELECT * FROM inventario";
$stmt = mysqli_query($conexion, $consulta);

$html .= '<html><body>';
$html .= '<style>';
$html .= '  h1{
                font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                text-align: center;
            }
            table {
                table-layout: fixed;
                width: 100%;
                border-collapse:collapse;
                font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
                text-align:center;
            }
            thead{
                width: 100%;
                background:#17224d;
                color:#fff;
            }
            td{
                border:1px solid black;
            }';
$html .= '</style>';
$html .= '<h1>Reporte de datos</h1>';

    $html .= '<table>';
    $html .= '<thead>
                <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cantidad en Bodega</th>
                        <th scope="col">Etatus</th>
             </thead>
                </tr>';

            if(mysqli_num_rows($stmt)>0)
            {
                while ($fila = mysqli_fetch_array($stmt))
                {
                    $html .= '<tr>';
                    $html .= '<td>'.$fila["codigoIn"].'</td>';
                    $html .= '<td>'.$fila["nombreProducto"].'</td>';
                    $html .= '<td>'.$fila["descripcion"].'</td>';
                    $html .= '<td>'.$fila["cantidadProducto"].'</td>';
                    $html .= '<td>'.$fila["cantidadProducto"].'</td>';
                    $html .= '</tr>';

                 }
             }

$html .= '</table></body></html>';


include("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//$dompdf->loadHtml(file_get_contents('html/inventario.php'));
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();