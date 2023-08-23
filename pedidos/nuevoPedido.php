<?php

include("../config/db_config.php");
setlocale(LC_TIME, 'es_MX.UTF-8');
// Obtén los valores enviados por AJAX
$idEmpleado = $_POST['idEmpleado'];
$cliente = $_POST['cliente'];
$folioNota = $_POST['folioNota'];
$total = $_POST['total'];
$valoresColumna = $_POST['valoresColumna'];
$dineroCuenta = $_POST['dineroCuenta'];
$resta = $_POST['resta'];
$fechaEntrega = $_POST['fechaEntrega'];
$fecha_formateada = date('Y-m-d', strtotime($fechaEntrega));
$date = date("Y-m-d");
$fecha_formateada_creacion = date('Y-m-d', strtotime($date));

$insertarTablaPedidos = "INSERT INTO ctl_ventapedidos (folio_nota ,
                                            estatus,
                                            dineroCuenta,
                                            dineroPendiente,
                                            costoPagar,
                                            fecha_entrega,
                                            fecha_creacion)
VALUES ('$folioNota','Pendiente',$dineroCuenta, $resta,$total,'$fecha_formateada','$fecha_formateada_creacion')";

//$insertarDatosPedidos = mysqli_query($conexion, $insertarTablaPedidos);

if (mysqli_query($conexion, $insertarTablaPedidos)) {
    // Obtiene el ID del último insert realizado
    $ultimoID = mysqli_insert_id($conexion);
    for ($i = 0; $i < count($valoresColumna); $i++) {
        $valor = $valoresColumna[$i];
        $sql = "INSERT INTO ctl_catalogo (id_ctl_ventapedidos,
                                          id_ctl_categorias,
                                          id_ctlUserSystem,
                                          idCliente)
        VALUES ($ultimoID,$valor,$idEmpleado,$cliente)";
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