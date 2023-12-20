<?php
session_start();

// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo'])) {
    header('location: ../index.php');
}
require_once("../config/db_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Inventario de Productos - Lavanderia Sapito</title>
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
                            <h6><?php echo ucfirst($_SESSION['nombre']); ?></h6>
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
                            <a class="dropdown-item d-flex align-items-center" href="#">
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
                <a class="nav-link collapsed" href="../pedidos/index.php">
                    <i class="bi bi-grid"></i>
                    <span>Crear Nueva Nota</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
        <a class="nav-link collapsed" href="../pedidos/pedidos-activos.php">
          <i class="bi bi-grid"></i>
          <span>Control de Pedidos Activos</span>
        </a>
      </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../consultaPedido/index.php">
                    <i class="bi bi-grid"></i>
                    <span>Historial de Notas Entregadas</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link">
                    <i class="bi bi-menu-button-wide"></i><span>Inventario de Productos</span>
                </a>
            </li><!-- End Components Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../categorias/index.php">
                    <i class="bi bi-tags"></i><span>Control de Categorias</span>
                </a>
            </li><!-- End Components Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../reportes/index.php">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Gestión de Reportes/Reportes Diarios</span>
                </a>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../gastos/index.php">
                    <i class="bi bi-bar-chart"></i><span>Control Gastos Generales</span>
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
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-question-circle"></i>
                    <span>Manual de Usuario</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../login/controller/cerrarSesion.php">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Salir del Sistema</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle" style="display: flex;">
            <h1>Panel Principal</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"></a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!--Inicio del Section Principal-->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="card-body">
                                    <h5 class="card-title">Control de Inventario </h5>
                                        <?php 
                                            $idInventario = $_GET["idInventario"];

                                            require_once("../config/db_config.php");
                                            $consulta = "SELECT * FROM inventario WHERE idInventario = $idInventario";
                                            $stmt = mysqli_query($conexion, $consulta);

                                            if(mysqli_num_rows($stmt)>0)
                                            {
                                                while ($fila = mysqli_fetch_array($stmt)) 
                                                {
                                                        ?>
                                                    <!-- No Labels Form -->
                                                    <form class="row g-3" action="updateInventori.php" method="post">
                                                        <input type="hidden" value="<?php echo $fila["idInventario"];?>" name="id">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" value="<?php echo $fila["nombreProducto"];?>" name="nombreProducto">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" value="<?php echo $fila["descripcion"];?>" name="descripcion">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" value="<?php echo $fila["codigoIn"];?>" name="codigoIn">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" class="form-control" value="<?php echo $fila["cantidadProducto"];?>" name="existencia">
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i> Guardar</button>
                                                            <a href="inventario.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                                                        </div>
                                                    </form><!-- End No Labels Form -->
                                                    <?php
                                                }    
                                            }
                                        ?>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->
<br><br><br><br><br><br><br>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Lavanderia_Sapito</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">Lavandería Sapito 2024</a>
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
    <script src="j../s/main.js"></script>

</body>

</html>