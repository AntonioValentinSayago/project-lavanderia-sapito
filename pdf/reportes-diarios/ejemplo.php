<?php
setlocale(LC_TIME, 'es_MX.UTF-8');
session_start();
// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../../../../index.php');
}

function getPlantilla($productos)
{
    $contenido = '
<title>Lavandenría Sapito | Reporte de Ingresos Diarios</title>
  <body>
 <header class="clearfix">
      <div id="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/394/394894.png"  width= "100" height="90">
      </div>
      <div id="company" class="clearfix">
        <div><h2>Lavandería Sapito</h2></div>
        
        <div>HEHD000000123</div>
        <div>Av. Robles, Comitan, Chiapas</div>
		<div>960000000</div>
      </div>
	  <br>
      <div id="project">
        <div><span>Autor: </span> ' . $_SESSION['email'] . '</div>
      </div>
	   <div id="project2">
        <div><span>FECHA: </span> ' . $date = date('d-m-Y') . '</div>
      </div>
    </header>
    <main>
			<p>Reporte de Ingresos Diarios</p>
      <table>
        <thead>
          <tr>
            <th class="qty">NO° DE FOLIO </th>
            <th class="qty">HORA DE ENTREGA </th>
            <th class="qty">OBSERVACIONES </th>
            <th class="desc">INGRESO $</th>
          </tr>
        </thead>
        <tbody>';
        $importetotal=0;
    foreach ($productos as $producto) {
      $importe=$producto["ingreso_total_diario"];
      $importetotal+=$importe;
        $contenido .= '
  					<tr>
  					<td class="qty">' . $producto["folio_nota"] . '</td>
                      <td class="qty">' . $producto["hora_entrega"] . '</td>
                      <td class="qty">' . $producto["ingreso_total_diario"] . '</td>
  					</tr>';
    }
    $contenido .= '
    <tr>
				<td class="qty" colspan="2"><strong>Total:</strong></td>
				<td class="total"><strong>$ '.number_format($importetotal,0).'</strong></td>
			</tr> 
        </tbody>
      </table>
	
	  <p>Este no es un comprobante fiscal</p>
	  
    </main>
    <footer>
      
    </footer>
    </body>';

    return $contenido;

}

?>