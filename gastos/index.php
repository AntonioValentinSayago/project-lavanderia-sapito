<?php
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

    <title>Control de Gastos - Lavanderia Sapito</title>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" rel="stylesheet"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" rel="stylesheet"></script>
    <link href=" https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />


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
                            <?php echo $_SESSION['email']; ?>
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

      <li class="nav-item ">
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
        <a class="nav-link" href="../gastos/index.php">
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
            <h1>Control de Gastos Generales</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"></a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </nav>
            <div style="margin-left: auto;">
                <a href="nuevoGastos.php"><button type="button" class="btn btn-primary btn-add"><i
                            class="bi bi-plus me-1"></i>Nuevo Gasto</button></a>
                <a href="../pdf/gastos/pdf.php" target="_target"><button type="button" class="btn btn-danger"><i
                            class="bi bi-filetype-pdf"></i> Generar Reporte</button></a>
            </div>
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
                                <div class="card-body pt-3">
                                    <hr>
                                    <table class="table table-borderless" id="example">
                                        <thead style="text-align:center">
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Descripcion</th>
                                                <th scope="col">Precio $Total</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once("../config/db_config.php");
                                            $consulta = "SELECT * FROM ctl_gastos ";
                                            $stmt = mysqli_query($conexion, $consulta);

                                            if (mysqli_num_rows($stmt) > 0) {
                                                while ($fila = mysqli_fetch_array($stmt)) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo $fila["fechaGasto"]; ?>
                                                        </th>
                                                        <td>
                                                            <?php echo $fila["nombreGasto"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila["descripcionGasto"]; ?>
                                                        </td>
                                                        <td class="text-largo">
                                                            <?php echo $fila["precioGasto"]; ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                            <a
                                                                href="editarGasto.php?nombreGasto=<?php echo $fila["nombreGasto"]; ?>"><span
                                                                    class="badge bg-warning"><i class="bi bi-pencil-square"></i>
                                                                </span></a>
                                                            <span class="badge bg-danger delete"
                                                                id='del_<?php echo $fila['nombreGasto'] ?>'
                                                                data-id='<?php echo $fila['nombreGasto'] ?>'
                                                                style="cursor:pointer;"><i class="bi bi-trash-fill"></i> </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="alert alert-danger" role="alert">
                                                    No existen Datos
                                                </div>
                                                <?php
                                            }
                                            mysqli_close($conexion);
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
    <script>
        $(document).ready(function () {
            // Delete 
            $('.delete').click(function () {
                var el = this;
                // Delete id
                var deleteid = $(this).data('id');
                // Confirm box
                bootbox.confirm("¿Seguro de borrar este producto?", function (result) {
                    if (result) {
                        // AJAX Request
                        $.ajax({
                            url: 'eliminar.php',
                            type: 'POST',
                            data: { id: deleteid },
                            success: function (response) {
                                // Removing row from HTML Table
                                if (response == 1) {
                                    $(el).closest('tr').css('background', 'tomato');
                                    $(el).closest('tr').fadeOut(800, function () {
                                        $(this).remove();
                                    });
                                } else {
                                    bootbox.alert('Record not deleted.');
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(function () {
            initDataTableCategory();
        })

        function initDataTableCategory() {

            tblDeliveryView = $("#example").DataTable({
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
                    "search": "Buscar Gasto:",
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