<?php 
    include("../config/db_config.php");

    $idCliente = $_POST["idCliente"];
    $nombreCompleto = $_POST["nombreCompleto"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
        //code...
        $insertar = "UPDATE clientes 
                    SET nombreCompleto = '$nombreCompleto', direccion = '$direccion', telefono = $telefono
                    WHERE idCliente = $idCliente";
        $insertar = mysqli_query($conexion, $insertar);

header("Location: clientes.php");