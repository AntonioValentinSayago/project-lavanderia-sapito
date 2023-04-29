<?php

  session_start();

  if($_SESSION['cargo'] == 0){
    header('location: ../view/user/index.php');
  }else if($_SESSION['cargo'] == 1){
    header('location: ../../pedidos/index.php');
  }

 ?>
