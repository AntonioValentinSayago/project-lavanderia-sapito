<?php

include("../config/db_config.php");

$idNota = $_POST["idNota"];
$folioNota = $_POST["folioNota"];
$cliente = $_POST["cliente"];
$telefono = $_POST["telefono"];
$dineroCuenta = $_POST["dineroCuenta"];
$resta = $_POST["resta"];
$total = $_POST["total"];
$fechaEntrega = $_POST["fechaEntrega"];
$empleado = $_POST["empleado"];

$consulta = "SELECT nombreCategoria from ctl_catalogo cata
inner join ctl_categorias cate ON cate.id_ctl_categorias = cata.id_ctl_categorias
where cata.id_ctl_ventapedidos = $idNota";
$resultado = mysqli_query($conexion, $consulta);
// Obtén los valores de la columna en un array
$columnaValores = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
  $columnaValores[] = $fila['nombreCategoria'];
}
// Construye la cadena de valores separada por comas
$valoresString = implode('-', $columnaValores);
echo $valoresString;

setlocale(LC_TIME, 'es_MX.UTF-8'); 
$date = date("Y-m-d");// Establece la configuración regional en español para México
$fecha = date('Y-m-d', strtotime($date)); // Obtiene la fecha actual en el formato "dia de mes de año"
$fecha_formateada_creacion = date('Y-m-d', strtotime($date));


//Inserta en la Tabla de reportes Diarios
if ($resta > 0) {
  # code...Insertart
  $sqlInsertReporte = "INSERT INTO ctl_reporte_diarios
      (fecha_reporte, ingreso_total_diario, id_ctl_ventapedidos)
      VALUES ('$fecha_formateada_creacion',$resta, $idNota )";
  if (mysqli_query($conexion, $sqlInsertReporte)) {
      echo "Valor insertado correctamente:<br>";
  } else {
      echo "Error al insertar valor: " . mysqli_error($conexion) . "<br>";
  }
}

$insertar = "INSERT INTO ctl_historial (folio_nota ,
                                        cliente ,
                                        telefono_cliente,
                                        empleado,
                                        total_pedido,
                                        estatus,
                                        descripcion,
                                        fecha_entrega)
                VALUES ('$folioNota','$cliente', $telefono,'$empleado',$total,'Entregado','$valoresString','$fecha')";

mysqli_query($conexion, $insertar);  

$sqlDelete = "DELETE FROM ctl_catalogo WHERE id_ctl_ventapedidos=" . $idNota;
mysqli_query($conexion, $sqlDelete);

$sqlDeleteDetalle = "DELETE FROM ctl_ventapedidos WHERE id_ctl_ventapedidos=" . $idNota;
mysqli_query($conexion, $sqlDeleteDetalle); 




header("Location: index.php");