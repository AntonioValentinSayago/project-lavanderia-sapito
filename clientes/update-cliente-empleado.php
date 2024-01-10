<?php 
include("../config/db_config.php");

$idCliente = $_POST["idCliente"];
$nombreCompleto = $_POST["nombreCompleto"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

// Escapar los datos para prevenir inyección SQL
$nombreCompleto = mysqli_real_escape_string($conexion, $nombreCompleto);
$direccion = mysqli_real_escape_string($conexion, $direccion);

// Verificar si $telefono está vacío o nulo
$telefono = ($telefono !== '') ? "'$telefono'" : 'NULL';

// Actualizar la base de datos
$insertar = "UPDATE clientes 
             SET nombreCompleto = '$nombreCompleto', direccion = '$direccion', telefono = $telefono
             WHERE idCliente = $idCliente";

$resultado = mysqli_query($conexion, $insertar);

if (!$resultado) {
    // Manejar el error, si es necesario
    die("Error al actualizar datos: " . mysqli_error($conexion));
}

header("Location: clientes-empleados.php");
?>
