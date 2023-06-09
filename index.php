<?php

/*
En ocasiones el usuario puede volver al login
aun si ya existe una sesion iniciada, lo correcto
es no mostrar otra ves el login sino redireccionarlo
a su pagina principal mientras exista una sesion entonces
creamos un archivo que controle el redireccionamiento
*/

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
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4 col-md-offset-4">
        <!-- Margen superior (css personalizado )-->
        <div class="spacing-1"></div>

        <!-- Estructura del formulario -->
        <fieldset>

          <legend class="center">CONTROL DE ACCESO</legend>
          <h5><img src="https://cdn-icons-png.flaticon.com/512/394/394894.png" style="width: 30px;"></img> Lavandería Sapito</h5>

          <!-- Caja de texto para usuario -->
          <label class="sr-only" for="user">Usuario</label>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input type="text" class="form-control" id="user" placeholder="Ingresa tu correo electronico">
          </div>
          <!-- Div espaciador -->
          <div class="spacing-2"></div>
          <!-- Caja de texto para la clave-->
          <label class="sr-only" for="clave">Contraseña</label>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
            <input type="password" autocomplete="off" class="form-control" id="clave" placeholder="Ingresa tu usuario">
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

          <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
              <div class="spacing-2"></div>
              <button type="button" class="btn btn-primary btn-block" name="button" id="login">Iniciar sesion</button>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>

  <!-- / Final Formulario login -->

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