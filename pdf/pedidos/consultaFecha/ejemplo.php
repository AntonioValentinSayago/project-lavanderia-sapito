<?php
date_default_timezone_set("America/Mexico_City");
session_start();
// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../../../../../index.php');
}

function getPlantilla($productos)
{
    $contenido = '
<title>Lavandenría Sapito | Reporte por fecha</title>
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
        <div><span>Empleado: </span> ' . ucfirst($_SESSION['nombre']) . '</div>
      </div>
	   <div id="project2">
        <div><span>Fecha de creación: </span> ' . $date = date('d-m-Y') . '</div>
      </div>
    </header>
    <main>
			<p>Historial de Pedidos</p>
      <table>
        <thead>
          <tr>
            <th class="qty">Folio Nota</th>
            <th class="qty">Cliente</th>
            <th class="desc">Telefono</th>
            <th class="desc">Estatus</th>
            <th class="desc">Empleado</th>
            <th class="desc">Descripción</th>
            <th class="desc">Total del día</th>
          </tr>
        </thead>
        <tbody>';

    $importetotal = 0;
    foreach ($productos as $producto) {
        $importe = $producto["total_pedido"];
        $importetotal += $importe;
        $contenido .= '
  					<tr>
  					<td class="qty">' . $producto["folio_nota"] . '</td>
                      <td class="qty">' . $producto["cliente"] . '</td>
                      <td class="qty">' . $producto["telefono_cliente"] . '</td>
                      <td class="qty">' . $producto["estatus"] . '</td>
                      <td class="qty">' . $producto["empleado"] . '</td>
                      <td class="qty">' . $producto["descripcion"] . '</td>
                      <td class="qty">$ ' . $producto["total_pedido"] . '</td>
  					</tr>';
    }
    $contenido .= '
    <tr>
    <td class="qty" colspan="6"><strong>Total: </strong></td>
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