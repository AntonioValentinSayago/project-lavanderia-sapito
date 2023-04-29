<?php 
    include("../config/db_config.php");

    $nombreProducto = $_POST["nombreProducto"];
    $descripcion = $_POST["descripcion"];
    $existencia = $_POST["existencia"];
    $codigoIn = $_POST["codigoIn"];

    $insertar = "INSERT INTO inventario (nombreProducto, cantidadProducto,descripcion, estatus,codigoIn)
                VALUES ('$nombreProducto',$existencia,'$descripcion','Disponible','$codigoIn')";
    $insertar = mysqli_query($conexion, $insertar);


header("Location: inventario.php");




