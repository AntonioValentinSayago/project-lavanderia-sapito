<?php 
    include("../config/db_config.php");

    $nombreEmp = $_POST["nombreEmp"];
    $lastEmp = $_POST["lastEmp"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $cargo = $_POST["cargo"];
    $numEmp = $_POST["numEmp"];
    $password = $_POST["password"];

    $insertar = "INSERT INTO ctl_usersystem (nombreCompleto, apellidoCompleto,email_correo, num_empleado, telefono, foto_perfil, clave, cargo, fecha_entrada, fecha_salida)
                VALUES ('$nombreEmp','$lastEmp','$email','$numEmp','$telefono','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png','$password','$cargo','2022-01-01','2022-01-01')";
    $insertar = mysqli_query($conexion, $insertar);


header("Location: index.php");




