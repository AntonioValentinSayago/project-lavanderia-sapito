<?php 
    include("../config/db_config.php");

    $id_ctlUserSystem = $_POST["id_ctlUserSystem"];
    $nombreEmp = $_POST["nombreEmp"];
    $lastEmp = $_POST["lastEmp"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $cargo = $_POST["cargo"];
    $numEmp = $_POST["numEmp"];
    $password = $_POST["password"];
        //code...
        $insertar = "UPDATE ctl_usersystem 
                    SET nombreCompleto = '$nombreEmp', apellidoCompleto = '$lastEmp',
                    email_correo = '$email', telefono = '$telefono', 
                    clave = '$password',
                    cargo = '$cargo',num_empleado = '$numEmp'
                    WHERE id_ctlUserSystem = $id_ctlUserSystem";
        $insertar = mysqli_query($conexion, $insertar);

header("Location: index.php");
