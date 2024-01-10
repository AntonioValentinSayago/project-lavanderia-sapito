<?php
include("../config/db_config.php");

$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"] ?: 'sin-numero';

$insertar = "INSERT INTO clientes (nombreCompleto, direccion, telefono)
             VALUES ('$nombre', '$direccion', $telefono)";

$resultado = mysqli_query($conexion, $insertar);

if (!$resultado) {
    // Manejar el error, si es necesario
    die("Error al insertar datos: " . mysqli_error($conexion));
}

header("Location: clientes-empleados.php");
