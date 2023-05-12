<?php 
    include("../config/db_config.php");

    $id_ctl_categorias = $_POST["id_ctl_categorias"];
    $nombreCategoria = $_POST["nombreCategoria"];
    $precio = $_POST["precio"];


        //code...
        $insertar = "UPDATE ctl_categorias 
                    SET nombreCategoria = '$nombreCategoria', precio = $precio
                    WHERE id_ctl_categorias = $id_ctl_categorias";
        $insertar = mysqli_query($conexion, $insertar);

header("Location: index.php");