<?php 
    include("../config/db_config.php");

    $idInventario = $_POST["id"];
    $nombreProducto = $_POST["nombreProducto"];
    $descripcion = $_POST["descripcion"];
    $existencia = $_POST["existencia"];
    $codigoIn = $_POST["codigoIn"];


        //code...
        $insertar = "UPDATE inventario 
                    SET nombreProducto = '$nombreProducto', cantidadProducto = $existencia,
                    descripcion = '$descripcion', codigoIn = $codigoIn
                    WHERE idInventario = $idInventario";
        $insertar = mysqli_query($conexion, $insertar);





header("Location: inventario.php");