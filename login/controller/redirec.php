<?php

  session_start();

  if($_SESSION['cargo'] == 0){
    header('location: ../../pedidos/index2.php');
  }else if($_SESSION['cargo'] == 1){
    header('location: ../../pedidos/index.php');
  }

 ?>
