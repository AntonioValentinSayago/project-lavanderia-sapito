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
  <link rel="stylesheet" href="../css/main.css">
  <!-- Template Main CSS File -->
  <link href="../css/style.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" rel="stylesheet"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" rel="stylesheet"></script>
  <link href=" https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />

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
          <span>Crear Nueva Nota</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../consultaPedido/index.php">
          <i class="bi bi-grid"></i>
          <span>Notas Entregadas</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" href="../inventario/inventario.php">
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
          <i class="bi bi-layout-text-window-reverse"></i><span>Reportes</span>
        </a>
      </li><!-- End Tables Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="../reportes/diarios.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Reportes Diarios</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../gastos/index.php">
          <i class="bi bi-bar-chart"></i><span>Gastos Generales</span>
        </a>
      </li><!-- End Charts Nav -->


      <li class="nav-item">
        <a class="nav-link ">
          <i class="bi bi-person"></i>
          <span>Control de Clientes</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../systemUser/index.php">
          <i class="bi bi-person-add"></i>
          <span>Empleados</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed">
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
      <h1>Cartera de Clientes</h1>
      <div style="margin-left: auto;">
        <a href="addCliente.php"><button type="button" class="btn btn-primary btn-add"><i
              class="bi bi-plus me-1"></i>Agregar Nuevo Cliente</button></a>
        <a href="../pdf/clientesPedido/pdf.php" target="_target"><button type="button" class="btn btn-danger"><i
              class="bi bi-filetype-pdf"></i> Generar Reporte de Clientes con Pedido</button></a>
      </div>
    </div><!-- End Page Title -->
    <!--Inicio del Section Principal-->
    <section class="section dashboard">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-3">
              <h5 class="card-title">Clientes con Pedido</h5>
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- Active Table -->
                  <table class="table table-striped" id="example1">
                    <thead>
                      <tr style="background:#F4f4f8;">
                        <th scope="col">Nombre del Cliente</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">No° Folio</th>
                        <th scope="col">Estatus Actual</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require_once("../config/db_config.php");
                      $consulta = "select DISTINCT nombreCompleto,cl.idCliente,estatus,direccion,folio_nota from ctl_catalogo cata
                      JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = cata.id_ctl_ventapedidos
                      JOIN clientes cl ON cl.idCliente = cata.idCliente";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        while ($fila = mysqli_fetch_array($stmt)) {
                          $Estatus = $fila["estatus"];
                          ?>
                          <tr style="text-align:center; text-transform: uppercase;">
                            <td>
                              <?php echo $fila["nombreCompleto"]; ?>
                            </td>
                            <td>
                              <?php echo $fila["direccion"]; ?>
                            </td>
                            <td>
                              <?php echo $fila["folio_nota"]; ?>
                            </td>
                            <td>
                              <span
                                class="badge <?php echo ($Estatus == 'Pendiente') ? 'bg-warning' : 'bg-success' ?> text-dark">
                                <?php echo ($Estatus == 'Pendiente') ? "Pendiente" : "Entregado" ?>
                              </span>
                            </td>
                            <td>
                              <span class="badge bg-success"><i class="bi bi-eye"></i> </span>
                            </td>
                          </tr>
                          <?php
                        }
                      } else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          No existen Clientes con Pedidos
                        </div>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                  <!-- End Active Table -->
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="pagetitle" style="display: flex;">
      <div style="margin-left: auto;">
        <a href="../pdf/clientes/pdf.php" target="_target"><button type="button" class="btn btn-danger"><i
              class="bi bi-filetype-pdf"></i> Generar Reporte</button></a>
      </div>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-3">
              <h5 class="card-title">Control de Clientes</h5>
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- Active Table -->
                  <table class="table table-striped" id="example">
                    <thead>
                      <tr style="background:#F4f4f8;">
                        <th scope="col">#</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $consulta = "select * from clientes";
                      $stmt = mysqli_query($conexion, $consulta);
                      if (mysqli_num_rows($stmt) > 0) {
                        while ($fila = mysqli_fetch_array($stmt)) {
                          $idCliente = $fila["idCliente"];
                          ?>
                          <tr style="text-align:center">
                            <th scope="row">
                              <?php echo $idCliente ?>
                            </th>
                            <th scope="row">
                              <?php echo $fila["nombreCompleto"]; ?>
                            </th>
                            <td>
                              <?php echo $fila["direccion"]; ?>
                            </td>
                            <td>
                              <?php echo $fila["telefono"]; ?>
                            </td>
                            <td>
                              <a href="editarCliente.php?idCliente=<?php echo $fila["idCliente"]; ?>"><span
                                  class="badge bg-warning"><i class="bi bi-pencil-square"></i>
                                </span></a>
                              <?php
                              $consultaCliente = "select * from ctl_catalogo where idCliente = $idCliente";
                              $stmtCliente = mysqli_query($conexion, $consultaCliente);
                              if (mysqli_num_rows($stmtCliente) >= 1) {
                                ?>
                                <span class="badge bg-danger" style="cursor:pointer;" onclick="validar()"><i
                                    class="bi bi-trash-fill"></i> </span>
                                <?php
                              } else {
                                ?>
                                <span class="badge bg-danger delete " id='del_<?php echo $idCliente ?>'
                                  data-id='<?php echo $idCliente ?>' style="cursor:pointer;"><i class="bi bi-trash-fill"></i>
                                </span>
                                <?php
                              }
                              ?>
                            </td>
                          </tr>
                          <?php
                        }
                      } else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          La cartera de Clientes esta vacia
                        </div>
                        <?php
                      }
                      mysqli_close($conexion);
                      ?>

                    </tbody>
                  </table>
                  <!-- End Active Table -->
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <script>
    function validar() {
      iziToast.warning({
        title: 'Advertencia',
        message: 'No puedo borrar un cliente con pedido',
        position: 'center'
      });
    }

    $(document).ready(function () {
      // Delete 
      $('.delete').click(function () {
        var el = this;
        // Delete id
        var deleteid = $(this).data('id');
        // Confirm box
        bootbox.confirm("¿Seguro de borrar este Cliente?", function (result) {
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
                  bootbox.alert('Errro de Servidor.');
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
      initDataTableDelivery();
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
          "search": "Buscar Cliente:",
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

    function initDataTableDelivery() {
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
          "search": "Buscar Cliente:",
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