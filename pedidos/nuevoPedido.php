<?php

include("../config/db_config.php");
date_default_timezone_set('America/Mexico_City');
// Obtén los valores enviados por AJAX
$idEmpleado = $_POST['idEmpleado'];
$cliente = $_POST['cliente'];
$folioNota = $_POST['folioNota'];
$total = $_POST['total'];
$valoresColumna = $_POST['valoresColumna'];
$dineroCuenta = $_POST['dineroCuenta'];
$resta = $_POST['resta'];

$fechaEntrega = $_POST['fechaEntrega'];
$obervaciones = $_POST['obervaciones'];
$horaEntrega = $_POST['horaEntrega'];
// Seperar la Hora y la Fecha
list($fecha_nueva, $hora) = explode('T', $fechaEntrega);
$fecha_nueva = date('Y-m-d', strtotime($fecha));
$hora = date('H:i:s', strtotime($hora));

$fecha_formateada = date('Y-m-d', strtotime($fechaEntrega));
$date = date("Y-m-d");
$fecha_formateada_creacion = date('Y-m-d', strtotime($date));

$updateTableFolio = "UPDATE config_folios SET ultimo_folio = $folioNota";
mysqli_query($conexion, $updateTableFolio);

$insertarTablaPedidos = "INSERT INTO ctl_ventapedidos (folio_nota ,
                                            estatus,
                                            dineroCuenta,
                                            dineroPendiente,
                                            costoPagar,
                                            fecha_entrega,
                                            fecha_creacion,
                                            hora_entrega,
                                            obervaciones)
VALUES ($folioNota,'Pendiente',$dineroCuenta, $resta,$total,'$fecha_formateada','$fecha_formateada_creacion','$horaEntrega', '$obervaciones')";

//$insertarDatosPedidos = mysqli_query($conexion, $insertarTablaPedidos);

if (mysqli_query($conexion, $insertarTablaPedidos)) {
    // Obtiene el ID del último insert realizado
    $ultimoID = mysqli_insert_id($conexion);
    for($i = 0; $i < count($valoresColumna); $i++) {
        $valor = $valoresColumna[$i]['nombreCategoria'];
        $cantidad = $valoresColumna[$i]['cantidad'];
        $sql = "INSERT INTO ctl_catalogo (id_ctl_ventapedidos,
                                          id_ctl_categorias,
                                          id_ctlUserSystem,
                                          idCliente,
                                          cantidad)
        VALUES ($ultimoID,$valor,$idEmpleado,$cliente,$cantidad)";
        if (mysqli_query($conexion, $sql)) {
            echo "Valor insertado correctamente: $valor<br>";
        } else {
            echo "Error al insertar valor: " . mysqli_error($conexion) . "<br>";
        }
    }
    echo "Valor insertado correctamente. ";
} else {
    echo "Error al insertar valor: " . mysqli_error($conexion);
}



?>