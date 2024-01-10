<?php 
    include("../config/db_config.php");

    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];


    $insertar = "INSERT INTO clientes (nombreCompleto ,
                                        direccion ,
                                        telefono)
                VALUES ('$nombre','$direccion', $telefono)";

    $insertar = mysqli_query($conexion, $insertar);


header("Location: clientes-empleados.php");
