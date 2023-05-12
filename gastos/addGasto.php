<?php 
    include("../config/db_config.php");

    $fecha = $_POST["fecha"];
    $nombreGasto = $_POST["nombreGasto"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    $fecha_formateada = date('Y-m-d', strtotime($fecha));

    $insertar = "INSERT INTO ctl_gastos (fechaGasto ,
                                        nombreGasto ,
                                        descripcionGasto ,
                                        precioGasto)
                VALUES ('$fecha_formateada','$nombreGasto','$descripcion','$precio')";

    $insertar = mysqli_query($conexion, $insertar);


header("Location: index.php");
