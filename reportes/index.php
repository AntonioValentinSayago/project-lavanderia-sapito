<?php

require_once("../config/db_config.php");

session_start();

// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo'])) {
  header('location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Empleados - Lavanderia Sapito</title>
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

  <!-- Template Main CSS File -->
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="https://cdn-icons-png.flaticon.com/512/394/394894.png" alt="">
        <span class="d-none d-lg-block">Sapito</span>
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
            <img src="<?php echo ucfirst($_SESSION['img']); ?>" alt="<?php echo ucfirst($_SESSION['nombre']); ?>"
              class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php echo ucfirst($_SESSION['nombre']); ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
                <?php echo ucfirst($_SESSION['nombre']); ?>
              </h6>
              <span>Empleado</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
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
        <a class="nav-link collapsed " href="../pedidos/index.php">
          <i class="bi bi-grid"></i>
          <span>Panel Principal</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../consultaPedido/index.php">
          <i class="bi bi-grid"></i>
          <span>Historial de Pedidos</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" href="../inventario/inventario.php">
          <i class="bi bi-menu-button-wide"></i><span>Inventario</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../categorias/index.php">
          <i class="bi bi-tags"></i><span>Control Categorias</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Reportes</span>
        </a>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../gastos/index.php">
          <i class="bi bi-bar-chart"></i><span>Gastos Generales</span>
        </a>
      </li><!-- End Charts Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../clientes/clientes.php">
          <i class="bi bi-person"></i>
          <span>Clientes</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../systemUser/index.php">
          <i class="bi bi-person-add"></i>
          <span>Empleados</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" onclick="example()">
          <i class="bi bi-question-circle"></i>
          <span>Manual de Usuario</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../login/controller/cerrarSesion.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Control de Reportes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../pedidos/index.php">Panel de Pedidos</a></li>
          <li class="breadcrumb-item active">Reportes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pedidos <span>| Pendientes</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $consulta = "SELECT *
                      from ctl_ventapedidos";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        $totalRegistros = mysqli_num_rows($stmt);
                        ?>
                        <h6>
                          <?php echo $totalRegistros ?>
                        </h6>
                        <?php
                      } ?>
                      <a href=""><span class="text-success small pt-1 fw-bold"></span> <span
                          class="text-muted small pt-2 ps-1"><i class="bi bi-filetype-pdf"></i> Generar PDF</span></a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Inventario <span>| En bodega</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-table"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $consulta = "SELECT *
                      from inventario";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        $totalRegistros = mysqli_num_rows($stmt);
                        ?>
                        <h6>
                          <?php echo $totalRegistros ?>
                        </h6>
                        <?php
                      } ?>
                      <a href="../pdf/inventario/pdf.php" target="_target"><span
                          class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"><i
                            class="bi bi-filetype-pdf"></i> Generar PDF</span></a>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Clientes <span>| Cartera Disponible</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $consulta = "SELECT *
                      from clientes";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        $totalRegistros = mysqli_num_rows($stmt);
                        ?>
                        <h6>
                          <?php echo $totalRegistros ?>
                        </h6>
                        <?php
                      } ?>
                      <a href="../pdf/clientes/pdf.php" target="_target"><span
                          class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"><i
                            class="bi bi-filetype-pdf"></i> Generar PDF</span></a>

                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->


        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Categorías <span>| Disponibles</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-tags"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $consulta = "SELECT *
                      from ctl_categorias";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        $totalRegistros = mysqli_num_rows($stmt);
                        ?>
                        <h6>
                          <?php echo $totalRegistros ?>
                        </h6>
                        <?php
                      } ?>
                      <a href="../pdf/categorias/pdf.php" target="_target"><span
                          class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"><i
                            class="bi bi-filetype-pdf"></i> Generar PDF</span></a>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Gastos generales <span>| Más recientes</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $consulta = "SELECT *
                      from ctl_gastos";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        $totalRegistros = mysqli_num_rows($stmt);
                        ?>
                        <h6>
                          <?php echo $totalRegistros ?>
                        </h6>
                        <?php
                      } ?>
                      <a href="../pdf/gastos/pdf.php" target="_target"><span
                          class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"><i
                            class="bi bi-filetype-pdf"></i> Generar PDF</span></a>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Empleados <span>| Disponibles</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $consulta = "SELECT *
                      from ctl_userSystem";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        $totalRegistros = mysqli_num_rows($stmt);
                        ?>
                        <h6>
                          <?php echo $totalRegistros ?>
                        </h6>
                        <?php
                      } ?>
                      <a href="../pdf/empleado/pdf.php" target="_target"><span
                          class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"><i
                            class="bi bi-filetype-pdf"></i> Generar PDF</span></a>

                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Lavanderia_Sapito</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">Lavandera Sapito </a>
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