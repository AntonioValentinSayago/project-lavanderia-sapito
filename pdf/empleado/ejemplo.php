<?php
setlocale(LC_TIME, 'es_MX.UTF-8');
session_start();
// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../../../../index.php');
}

function getPlantilla($productos){
$contenido='
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
        <div><span>CLIENTE: </span> '.ucfirst($_SESSION['nombre']).'</div>
      </div>
	   <div id="project2">
        <div><span>FECHA: </span> '.$date = date('d-m-Y').'</div>
      </div>
    </header>
    <main>
			<p>Control de acceso</p>
      <table>
        <thead>
          <tr>
            <th class="qty">Nombre (S)</th>
            <th class="qty">Correo Electronico</th>
            <th class="desc">Telefono</th>
            <th class="desc">#Empleado</th>
            <th class="desc">Cargo</th>
            <th class="desc">Fecha de Registro</th>
          </tr>
        </thead>
        <tbody>';
          foreach($productos as $producto){
            $contenido.='
  					<tr>
  					<td class="qty">'.$producto["nombreCompleto"].' '.$producto["apellidoCompleto"].'</td>
  					<td class="desc">'.$producto["email_correo"].'</td>
  					<td class="desc">'.$producto["telefono"].'</td>
  					<td class="desc">'.$producto["num_empleado"].'</td>
  					<td class="desc">'.$producto["cargo"].'</td>
  					<td class="desc">'.$producto["fecha_creacion"].'</td>
  					</tr>';
          }
          $contenido.='
        </tbody>
      </table>
	<div>0: Empleado</div>
    <div>1: Administrador</div>
	  <p>Este no es un comprobante fiscal</p>
	  
    </main>
    <footer>
      
    </footer>
    </body>';

    return $contenido;

  }

    ?>
