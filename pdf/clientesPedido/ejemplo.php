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
<title>Lavandenría Sapito | Reporte </title>
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
        <div><span>CLIENTE: </span> ' . ucfirst($_SESSION['nombre']) . '</div>
      </div>
	   <div id="project2">
        <div><span>FECHA: </span> ' . $date = date('d-m-Y') . '</div>
      </div>
    </header>
    <main>
			<p>Reporte de Pedidos</p>
      <table>
        <thead>
          <tr>
            <th class="qty">Folio</th>
            <th class="qty">Nombre Cliente</th>
            <th class="qty">Dirección</th>
            <th class="desc">Fecha Entrega</th>
            <th class="qty">Nombre Empleado</th>
            <th class="qty">Total a Pagar</th>
          </tr>
        </thead>
        <tbody>';
    $importetotal = 0;
    foreach ($productos as $producto) {
        $importe = $producto["costoPagar"];
        $importetotal += $importe;
        $contenido .= '
  					<tr>
                      <td class="qty">' . $producto["folio_nota"] . '</td>
  					<td class="qty">' . $producto["nombreCompleto"] . '</td>
                      <td class="qty">' . $producto["direccion"] . '</td>
                      <td class="qty">' . $producto["fecha_entrega"] . '</td>
  					<td class="desc">' . $producto["NombreEmpleado"] . '</td>
  					<td class="qty">' . $producto["costoPagar"] . '</td>
  					</tr>';
    }
    $contenido .= '
          <tr>
				<td class="qty" colspan="5"><strong>Total:</strong></td>
				<td class="total"><strong>$ ' . number_format($importetotal, 0) . '</strong></td>
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