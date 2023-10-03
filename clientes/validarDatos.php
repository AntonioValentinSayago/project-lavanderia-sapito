<?php 
    include("../config/db_config.php");

    if(isset($_POST['valor'])){

        $valor = $_POST['valor'];
    
        $consulta = "SELECT * FROM clientes WHERE nombreCompleto = '$valor'";
        $resultado = mysqli_query($conexion, $consulta);
    
        if(mysqli_num_rows($resultado) > 0){
            echo "¡Este Nombre ya existe en la base de datos!";
        } else {
            echo "";
        }
    }