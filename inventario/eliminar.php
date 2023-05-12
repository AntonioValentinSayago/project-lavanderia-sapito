<?php
include("../config/db_config.php");


if(isset($_POST['id'])){
   $id=  $_POST['id'];

   $sql = "DELETE FROM inventario WHERE idInventario=".$id;
   mysqli_query($conexion,$sql);
   echo 1;
   exit;
}

echo 0;
exit;

?>