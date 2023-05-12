<?php 
    include("../config/db_config.php");

    $fechaGasto = $_POST["fechaGasto"];
    $nombreGasto = $_POST["nombreGasto"];
    $descripcionGasto = $_POST["descripcionGasto"];
    $precioGasto = $_POST["precioGasto"];

    $fecha_formateada = date('Y-m-d', strtotime($fechaGasto));

        //code...
        $insertar = "UPDATE ctl_gastos
                    SET fechaGasto = '$fecha_formateada' , nombreGasto = '$nombreGasto',
                    descripcionGasto = '$descripcionGasto' , precioGasto = $precioGasto
                    WHERE nombreGasto = '$nombreGasto'";
        $insertar = mysqli_query($conexion, $insertar);

header("Location: index.php");