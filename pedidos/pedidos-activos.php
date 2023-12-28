<?php
session_start();

// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
  header('location: ../index.php');
}
require_once("../config/db_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Delivery - Lavanderia Sapito</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://cdn-icons-png.flaticon.com/512/394/394894.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">

  <!-- Template Main CSS File -->
  <link href="../css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" rel="stylesheet"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" rel="stylesheet"></script>
  <link href=" https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="https://cdn-icons-png.flaticon.com/512/394/394894.png" alt="">
        <span class="d-none d-lg-block">Lavandería Sapito</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php echo ($_SESSION['email']); ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
                <?php echo ucfirst($_SESSION['nombre']); ?>
              </h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>¿Necesitas Ayuda?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="../login/controller/cerrarSesion.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Salir del Sistema</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Crear Nueva Nota</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="bi bi-grid"></i>
          <span>Control de Pedidos Activos</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../consultaPedido/index.php">
          <i class="bi bi-grid"></i>
          <span>Historia de Notas Entregadas</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../inventario/inventario.php">
          <i class="bi bi-menu-button-wide"></i><span>Inventario de Productos</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../categorias/index.php">
          <i class="bi bi-tags"></i><span>Control Categorias</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../reportes/index.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Gestion de Reportes/Reportes Diarios <span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../gastos/index.php">
          <i class="bi bi-bar-chart"></i><span>Control de Gastos Generales</span>
        </a>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../clientes/clientes.php">
          <i class="bi bi-person"></i>
          <span>Control de Clientes</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../systemUser/index.php">
          <i class="bi bi-person-add"></i>
          <span>Control de Empleados</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-question-circle"></i>
          <span>Manual de Usuario</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../login/controller/cerrarSesion.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Salir del  Sistema</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    </ul>
    
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle" style="display: flex;">
      <h1>Control de Pedidos Activos</h1>
    </div><!-- End Page Title -->

    <!--Inicio del Section Principal-->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <p class="mt-5" style="font-weight: 900;">
                
                  <?php 
                    // Establecer la zona horaria a la Ciudad de México
                    date_default_timezone_set('America/Mexico_City');
                    
                    // Crear un objeto DateTimeImmutable con la fecha y hora actuales
                    $fecha_actual = new DateTimeImmutable();
                    // Obtener la fecha formateada
                    $fecha_formateada = $fecha_actual->format('Y-m-d H:i:s');

                    // Imprimir la fecha
                    echo "Fecha actual en la Ciudad de México: $fecha_formateada";
              ?>
                    </p>
                  <hr>
                  <table class="table table-borderless" id="example1">
                    <thead>
                      <tr>
                        <th scope="col">$ Número de Folio</th>
                        <th scope="col">$ Total</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Nombre del Cliente</th>
                        <th scope="col">Ver Detalles</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $consulta = "SELECT DISTINCT folio_nota,
                      ped.estatus, ped.dineroCuenta,ped.dineroPendiente, ped.costoPagar,ped.fecha_entrega,
                      cl.nombreCompleto as nombreCliente,
                      cata.id_ctl_ventapedidos 
                                    FROM ctl_catalogo cata
                                    join ctl_categorias cate ON cate.id_ctl_categorias = cata.id_ctl_categorias
                                    JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = cata.id_ctl_ventapedidos
                                    JOIN clientes cl ON cl.idCliente = cata.idCliente
                                    JOIN ctl_usersystem  emp ON emp.id_ctlUserSystem = cata.id_ctlUserSystem";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        while ($fila = mysqli_fetch_array($stmt)) {
                          $Estatus = $fila["estatus"];
                          ?>
                          <tr>
                            <th scope="row" style="text-align:center;">
                              <?php echo $fila["folio_nota"]; ?>
                            </th>
                            <td style="text-align:center;">
                              $ <?php echo $fila["costoPagar"]; ?> MXN
                            </td>
                            <td style="text-align:center;">
                              <span
                                class="badge <?php echo ($Estatus == 'Pendiente') ? 'bg-warning' : 'bg-success' ?> text-dark">
                                <?php echo ($Estatus == 'Pendiente') ? "PENDIENTE" : "ENTREGADO" ?>
                              </span>
                            </td>
                            <td style="text-align:center;">
                              <?php echo $fila["nombreCliente"]; ?>
                            </td>
                            <td style="text-align:center;">
                              <a href="verNota.php?idPedido=<?php echo $fila["id_ctl_ventapedidos"] ?>"><span
                                  class="badge bg-success"><i class="bi bi-eye-fill"></i></span></a>

                              <a href="imprimirTicket.php?idPedido=<?php echo $fila["id_ctl_ventapedidos"] ?>"
                                target="_black"><span class="badge bg-warning"><i
                                    class="bi bi-file-earmark-medical-fill"></i></span></a>

                            </td>
                          </tr>
                          <?php
                        }
                      } else {
                        ?>
                        <h5 class="alert" style="background-color: #fbbf24; font-weight: 900;">No hay registros actuales de pedidos</h5>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <script>
    /* ---------------------------------------------------*/
    $(function () {
      initDataTableDelivery();
      initDataTableCategory();
    })

    function initDataTableCategory() {
      tblDeliveryView = $("#example1").DataTable({
        fixedMeader: true,
        "language": {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": " _START_ a _END_ de _TOTAL_ Registros",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Registros",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar Pedido:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        },
        "columns": [
          null, // Primera columna (Nombre) - Será searchable
          { "searchable": false }, // Segunda columna (Edad) - No será searchable
          null,
          null,
          null // Tercera columna (Ciudad) - Será searchable
        ]
      });

    }

    function initDataTableDelivery() {
      tblDeliveryView = $("#example2").DataTable({
        fixedMeader: true,
        "language": {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": " _START_ a _END_ de _TOTAL_ Registros",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Registros",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar Precio:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        },
      });
    }

  </script>
  <script>

    function alertaMensaje() {
      iziToast.warning({
        title: 'Error:',
        message: 'Servicio en Mantenimiento',
        position: 'topCenter',
        timeout: 4000,
      });
    }
  </script>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Lavanderia_Sapito</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">Lavandería Sapito 2024 </a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/chart.js/chart.umd.js"></script>
  <script src="../vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../vendor/echarts/echarts.min.js"></script>
  <script src="../vendor/quill/quill.min.js"></script>
  <script src="../vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../vendor/tinymce/tinymce.min.js"></script>
  <script src="../vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../js/main.js"></script>

</body>

</html>