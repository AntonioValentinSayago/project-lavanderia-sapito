<?php


session_start();

// isset verifica si existe una variable o eso creo xd
if (isset($_SESSION['id'])) {
  header('location: login/controller/redirec.php');
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Lavanderia Sapito | Control de Acceso</title>

  <link href="https://cdn-icons-png.flaticon.com/512/394/394894.png" rel="icon">
  <!-- Importamos los estilos de Bootstrap -->
  <link rel="stylesheet" href="login/css/bootstrap.min.css">
  <!-- Font Awesome: para los iconos -->
  <link rel="stylesheet" href="login/css/font-awesome.min.css">
  <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
  <link rel="stylesheet" href="login/css/sweetalert.css">
  <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
  <link rel="stylesheet" href="login/css/style.css">

</head>

<body">
  <!-- Formulario Login -->
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2"
      style="background-image: url('img/lavanderia.png')">
    </div>

    <div class="contents order-2 order-md-1">
      <div class="container">
        <!-- Estructura del formulario -->
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 style="text-align:center">Lavandería<strong> Sapito</strong> <img src="img/394894icono.png" alt="logo" width="50px"></h3>
            <div class="form-group first">
              <label for="username">Correo Electronico</label>
              <input type="text" class="form-control" placeholder="tu-email@gmail.com" id="user" sryle="border: 1px solid black"/>
            </div>
            <div class="form-group last mb-3">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" placeholder="****************" id="clave"
                autocomplete="off" sryle="border: 1px solid black"/>
            </div>
            <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
            <div class="row" id="load" hidden="hidden">
              <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                <img src="img/load.gif" width="100%" alt="">
              </div>
              <div class="col-xs-12 center text-accent">
                <span>Validando información...</span>
              </div>
            </div>
            <!-- Fin load -->
            <button type="button" class="btn btn-enviar btn-block" style="background: #0891b2; color:white; font-weight:900" name="button" id="login">Entrar al Sistema</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery -->
  <script src="login/js/jquery.js"></script>
  <!-- Bootstrap js -->
  <script src="login/js/bootstrap.min.js"></script>
  <!-- SweetAlert js -->
  <script src="login/js/sweetalert.min.js"></script>
  <!-- Js personalizado -->
  <script src="login/js/operaciones.js"></script>
  </body>

</html>