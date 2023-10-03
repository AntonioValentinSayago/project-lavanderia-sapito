<?php
session_start();

// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Lavanderia Sapito</title>
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
                        <img src="<?php echo ucfirst($_SESSION['img']); ?>"
                            alt="<?php echo ucfirst($_SESSION['nombre']); ?>" class="rounded-circle">
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
                            <a class="dropdown-item d-flex align-items-center"
                                href="../login/controller/cerrarSesion.php">
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
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Reportes</span>
                </a>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../gastos/index.php">
                    <i class="bi bi-bar-chart"></i><span>Gastos Generales</span>
                </a>
            </li><!-- End Charts Nav -->


            <li class="nav-item">
                <a class="nav-link " href="users-profile.html">
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
                <a class="nav-link collapsed" href="pages-faq.html">
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

        <div class="pagetitle" style="display: flex;">
            <h1>Agregar Nuevo Cliente</h1>
            <nav>
                <!--         <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item active">Panel Principal</li>
        </ol>  -->
            </nav>
            <div style="margin-left: auto;">
                <button type="button" class="btn btn-primary btn-add" onclick="example()"><i
                        class="bi bi-plus me-1"></i>Cliente</button>
                <button type="button" class="btn btn-danger" onclick="example()"><i class="bi bi-filetype-pdf"></i>
                    Generar Reporte</button>
            
            </div>
        </div><!-- End Page Title -->

        <script>
            function example() {
                iziToast.warning({
                    title: 'Error:',
                    message: 'Comunicación con el servidor, servicio en mantenimiento',
                    position: 'topCenter',
                    timeout: 3000,
                });
            }
        </script>

        <!--Inicio del Section Principal-->
        <section class="section dashboard">
            <div class="row">

                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <hr>
                            <!-- No Labels Form -->
                            <form class="row g-3 mt-2" action="newCliente.php" method="post">
                                <div class="col-md-6">
                                    <label for="">Nombre Completo*</label>
                                    <input type="text" class="form-control" name="nombre" id="nombreCliente" placeholder="Nombre Completo*">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Telefono*</label>
                                    <input type="number" class="form-control" name="telefono" id="telefononCliente" placeholder="Telefono">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Dirección*</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Dirección">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success" id="registroButton"><i class="bi bi-save-fill"></i>
                                        Guardar Nuevo Cliente</button>
                                    <a href="clientes.php"><button type="button"
                                            class="btn btn-secondary">Cancelar</button></a>
                                </div>
                            </form><!-- End No Labels Form -->


                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->
    
    <script>
        $(document).ready(function () {
            $("#nombreCliente").on("blur", function () {
                let nombre = $(this).val();
                $.ajax({
                    url: 'validarDatos.php',
                    type: 'post',
                    data: { valor: nombre },
                    success: function (response) {
                        $("#nombreStatus").html(response);
                        if (response.trim() == "¡Este Nombre ya existe en la base de datos!") {
                            $("#registroButton").prop('disabled', true);
                        } else {
                            $("#registroButton").prop('disabled', false);
                        }
                    }
                });
            });
        });

    </script>
    <br><br><br><br><br><br><br>
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

    <script>
        function error() {
            alertify
                .alert("Error de Servidor", function () {
                    alertify.message('OK');
                });
        }
    </script>

</body>

</html>