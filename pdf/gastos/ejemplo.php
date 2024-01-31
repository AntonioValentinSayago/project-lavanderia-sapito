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
			<p>Desglose de productos</p>
      <table>
        <thead>
          <tr>
            <th class="qty">Nombre</th>
            <th class="qty">Descripción</th>
            <th class="desc">Fecha del Gasto</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>';

          $importetotal=0;
          foreach($productos as $producto){
            $importe=$producto["precioGasto"];
            $importetotal+=$importe;
            $contenido.='
  					<tr>
  					<td class="qty">'.$producto["nombreGasto"].'</td>
  					<td class="desc">'.$producto["descripcionGasto"].'</td>
  					<td class="desc">'.$producto["fechaGasto"].'</td>
  					<td class="total">$ '.$producto["precioGasto"].'</td>
  					</tr>';
          }
          $contenido.='
			   <tr>
				<td class="qty" colspan="3"><strong>Total:</strong></td>
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
