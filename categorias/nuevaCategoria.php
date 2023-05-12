<?php 
    include("../config/db_config.php");
    setlocale(LC_TIME, 'es_MX.UTF-8');
    $nombreCategoria = $_POST["nombreCategoria"];
    $precio = $_POST["precio"];

    $date = date("Y-m-d");
    $fecha_formateada = date('Y-m-d', strtotime($date));
    $insertar = "INSERT INTO ctl_categorias (nombreCategoria ,
                                        precio ,
                                        fecha_creacion)
                VALUES ('$nombreCategoria',$precio, '$fecha_formateada')";

    $insertar = mysqli_query($conexion, $insertar);

header("Location: index.php");
