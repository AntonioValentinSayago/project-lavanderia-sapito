<?php
session_start();
setlocale(LC_TIME, 'es_MX.UTF-8');
// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 0) {
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
        <a class="nav-link collapsed" href="../clientes/clientes.php">
          <i class="bi bi-person"></i>
          <span>Control de Clientes</span>
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
        <h1>DETALLE DEL PEDIDO</h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="pedidos-activos.php"><button type="button"
                    class="btn" style="background: #991b1b; color:white">Regresar</button>
            </a>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"></a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <?php
        $idNota = $_GET["idPedido"];
        $consulta = "SELECT ped.folio_nota, ped.estatus, ped.dineroCuenta,ped.dineroPendiente, ped.costoPagar,
        ped.fecha_entrega,ped.obervaciones,
                            cate.nombreCategoria,
                            cl.nombreCompleto as nombreCliente, cl.direccion,cl.telefono, 
                            emp.nombreCompleto as nombreEmpleado
                                                FROM ctl_catalogo cata
                                                JOIN ctl_categorias cate ON cate.id_ctl_categorias = cata.id_ctl_categorias
                                                JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = cata.id_ctl_ventapedidos
                                                JOIN clientes cl ON cl.idCliente = cata.idCliente
                                                JOIN ctl_usersystem  emp ON emp.id_ctlUserSystem = cata.id_ctlUserSystem
                                                WHERE cata.id_ctl_ventapedidos = $idNota
                                                LIMIT 1
                                                ";
        $stmt = mysqli_query($conexion, $consulta);
        ?>
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
                                    <hr>
                                    <?php
                                    if (mysqli_num_rows($stmt) > 0) {
                                        while ($fila = mysqli_fetch_array($stmt)) {
                                            $Estatus = $fila["estatus"]; ?>
                                            <form class="row g-3 mt-2" action="updateNota.php" method="POST" id="miForm">
                                                <div class="col-md-2">
                                                    <label for="">ESTATUS</label>
                                                    <input type="hidden" name="idNota" value="<?php echo $idNota ?>" id="idNota">
                                                    <input type="text" class="form-control" name="estatus" id="estatus"
                                                        value="<?php echo $fila["estatus"]; ?>" disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">NÚMERO DE FOLIO</label>
                                                    <input type="hidden" name="idCliente" value="">
                                                    <input type="text" class="form-control" name="folioNota" id="folioNota"
                                                        value="<?php echo $fila["folio_nota"]; ?>" disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">NOMBRE DEL CLIENTE</label>
                                                    <input type="text" class="form-control" name="cliente" id="cliente"
                                                        value="<?php echo $fila["nombreCliente"]; ?>" disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">TELÉFONO (opcional)</label>
                                                    <input type="number" class="form-control" name="telefono" id="telefono"
                                                        value="<?php echo $fila["telefono"]; ?>" disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Descripción</th>
                                                                <th scope="col">Cantidad</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>                                                    
                                                            <?php
                                                            $consultaCate = "SELECT nombreCategoria, cata.cantidad AS Cantidad from ctl_catalogo cata
                                                            inner join ctl_categorias cate ON cate.id_ctl_categorias = cata.id_ctl_categorias
                                                            where cata.id_ctl_ventapedidos = $idNota;";
                                                            $stmtCate = mysqli_query($conexion, $consultaCate);
                                                            if (mysqli_num_rows($stmtCate) > 0) {
                                                                while ($filaCate = mysqli_fetch_array($stmtCate)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" id="descripcion" class="form-control"
                                                                                name="descripcion"
                                                                                value="<?php echo $filaCate["nombreCategoria"]; ?>"
                                                                                disabled style="background-color: #cbd5e1; font-weight: 500;">
                                                                        </td>
                                                                        <td style="text-align:center">
                                                                            <p><?php echo $filaCate["Cantidad"]; ?></p>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">DINERO A CUENTA</label>
                                                    <input type="number" class="form-control" name="dineroCuenta" id="dineroCuenta"
                                                        value="<?php echo $fila["dineroCuenta"]; ?>" disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">RESTA POR PAGAR: *</label>
                                                    <input type="number" class="form-control" name="resta" id="resta"
                                                        value="<?php echo $fila["dineroPendiente"]; ?>" disabled
                                                        style="border: 1px solid #fecaca;background-color: #fecaca; font-weight: 900;">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">TOTAL DEL PEDIDO:*</label>
                                                    <input type="number" class="form-control" name="total" id="total"
                                                        value="<?php echo $fila["costoPagar"]; ?>" disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">FECHA ESTIMADA DE ENTREGA</label>
                                                    <input type="text" class="form-control" name="fechaEntrega" id="fechaEntrega"
                                                        value="<?php echo $fila["fecha_entrega"]; ?>" disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="col-md-4">
                                                <label for="">NOMBRE DEL EMPLEADO </label>
                                                    <input type="text" class="form-control" name="empleado" id="empleado"
                                                        value="<?php echo ucfirst($_SESSION['nombre']); ?>" disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">OBSERVACIONES:</label>
                                                    <input type="text" class="form-control" name="horaEntrega"
                                                        id="horaEntrega" value="<?php echo $fila["obervaciones"]; ?>"
                                                        disabled style="background-color: #cbd5e1; font-weight: 900;">
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn" style="background:#34d399; color:#f0fdf4;"><i
                                                            class="bi bi-save-fill"></i>
                                                        Entregar Pedido</button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleCancelar"
                                                            class="btn btn-danger" style="background: #991b1b; color:white">Cancelar Pedido</button>
                                                </div>
                                            </form><!-- End No Labels Form -->
                                                                                                    <!-- Modal Cancelar Pedido-->
<div class="modal fade" id="exampleCancelar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:#dc2626; font-weight: 900;" id="exampleModalLabel"><img class="img-fluid" src="https://assets.stickpng.com/images/5a81af7d9123fa7bcc9b0793.png" alt="img" width="25px"> ADEVERTENCIA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿ESTAS SEGURO DE CANCELAR ESTE PEDIDO? <br/><br/>
    <form action="cancelarNota.php" method="POST">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
            <label class="form-check-label" for="flexCheckDefault">
                Estoy conciente de realizar esta acción, no podrá deshacer en un futuro
            </label>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="idNota" value="<?php echo $idNota ?>"id="idNota">
        <input type="hidden" name="estatus" id="estatus" value="<?php echo $fila["estatus"]; ?>">
        <input type="hidden" name="folioNota" id="folioNota"value="<?php echo $fila["folio_nota"]; ?>">
        <input type="hidden" name="cliente" id="cliente"value="<?php echo $fila["nombreCliente"]; ?>">
        <input type="hidden" name="telefono" id="telefono"value="<?php echo $fila["telefono"]; ?>">
        <input type="hidden"name="fechaEntrega"id="fechaEntrega" value="<?php echo $fila["fecha_entrega"]; ?>">
        <input type="hidden" id="descripcion" name="descripcion" value="<?php echo $filaCate["nombreCategoria"]; ?>">
        <input type="hidden" name="dineroCuenta"id="dineroCuenta" value="<?php echo $fila["dineroCuenta"]; ?>">
        <input type="hidden" name="total" id="total"value="<?php echo $fila["costoPagar"]; ?>">
        <input type="hidden" name="horaEntrega"id="horaEntrega" value="<?php echo $fila["hora_entrega"]; ?>">
        <input type="hidden" name="empleado" id="empleado"value="<?php echo ucfirst($_SESSION['nombre']); ?>" >
        <input type="hidden" name="horaEntrega"id="horaEntrega" value="<?php echo $fila["obervaciones"]; ?>" >
        <button type="button" class="btn" data-bs-dismiss="modal" style="background: #991b1b; color:white">No, Cerrar ventana</button>
        <button type="submit" class="btn" style="background:#34d399; color:#f0fdf4;">Si, confirmo </button>
</form>
      </div>
    </div>
  </div>
</div>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <h5 class="alert alert-danger">No hay registros en la base de datos</h5>
                                        <?php
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
    <script>
        document.getElementById('miForm').addEventListener('submit', function (e) {
            // Habilita el campo deshabilitado antes de enviar el formulario
            document.getElementById('idNota').disabled = false;
            document.getElementById('folioNota').disabled = false;
            document.getElementById('cliente').disabled = false;
            document.getElementById('telefono').disabled = false;
            document.getElementById('descripcion').disabled = false;
            document.getElementById('dineroCuenta').disabled = false;
            document.getElementById('resta').disabled = false;
            document.getElementById('total').disabled = false;
            document.getElementById('fechaEntrega').disabled = false;
            document.getElementById('empleado').disabled = false;
        });

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