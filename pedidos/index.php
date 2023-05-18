<?php
session_start();
setlocale(LC_TIME, 'es_MX.UTF-8');
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

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" rel="stylesheet"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" rel="stylesheet"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
  <link href=" https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

  <!--   <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script> -->
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
              <span>Administrador</span>
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
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Panel Principal</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../inventario/inventario.php">
          <i class="bi bi-menu-button-wide"></i><span>Inventario</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../categorias/index.php">
          <i class="bi bi-tags"></i><span>Control Categorias</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
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
      <h1>Control de Pedidos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"></a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </nav>
      <div style="margin-left: auto;">
        <button type="button" class="btn btn-primary btn-add"><i class="bi bi-person-fill-add"></i> Nuevo
          Cliente</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
          id="showTable"><i class="bi bi-eye-fill"></i> Control Pedidos</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
          id="showTable"><i class="bi bi-eye-fill"></i> Lista de Precios</button>
      </div>
    </div><!-- End Page Title -->

    <!--Inicio del Section Principal-->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-4">
          <div class="row">
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body mt-2">
                  <h5 style="font-size:10px;padding:0px 0px 0px 0px">
                    <?php setlocale(LC_TIME, 'es_MX.UTF-8');
                    echo date('d \d\e F \d\e Y'); ?>
                  </h5>
                  <hr>
                  <!-- No Labels Form -->
                  <form class="row g-3">
                    <div class="col-md-9">
                      <label for="">Categoría</label>
                      <select class="form-control" type="text" onchange="selectNit(event)" id="categoria">
                        <?php
                        $consultaCategoria = "SELECT * FROM ctl_categorias";
                        $stmtCategoria = mysqli_query($conexion, $consultaCategoria);
                        if (mysqli_num_rows($stmtCategoria) > 0) {
                          while ($fila = mysqli_fetch_array($stmtCategoria)) {
                            ?>
                            <option data-nit="<?php echo $fila["precio"]; ?>"
                              value="<?php echo $fila["id_ctl_categorias"]; ?>">
                              <?php echo $fila["nombreCategoria"]; ?>
                            </option>
                            <?php
                          }
                        } else {
                          ?>
                          <option value="null" selected>No existen Categorías</option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="">Precio $</label>
                      <input type="number" class="form-control" id="nit">
                    </div>
                    <div class="col-md-12">
                      <button type="button" class="btn btn-primary" id="adicionar">Agregar</button>
                      <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </div>
                  </form><!-- End No Labels Form -->
                </div>
              </div>
            </div><!-- End Recent Sales -->
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card recent-sales overflow-auto">
            <div class="card-body mt-2">
              <h5 style="font-size:10px;padding:0px 0px 0px 0px">
                <?php setlocale(LC_TIME, 'es_MX.UTF-8');
                echo date('d \d\e F \d\e Y'); ?>
              </h5>
              <hr>
              <!-- No Labels Form -->
              <form class="row g-3 formularioVenta">
                <div class="col-md-9">
                  <label for="">Cliente</label>
                  <!-- data-live-search="true" data-live-search-style="startsWith" -->
                  <select class="form-control" type="text">
                    <?php
                    $consultaClientes = "SELECT * FROM clientes";
                    $stmtClientes = mysqli_query($conexion, $consultaClientes);
                    if (mysqli_num_rows($stmtClientes) > 0) {
                      while ($fila = mysqli_fetch_array($stmtClientes)) {
                        ?>
                        <option value="<?php echo $fila["idCliente"]; ?>">
                          <?php echo $fila["nombreCompleto"]; ?>
                        </option>
                        <?php
                      }
                    } else {
                      ?>
                      <option value="null" selected>No existen Clientes</option>
                      <?php
                    }
                    ?>
                  </select>

                </div>
                <div class="col-md-3">
                  <label for="">Folio Nota</label>
                  <?php $numero = random_int(1, 99); ?>
                  <input type="text" class="form-control" value="LSFN<?php echo $numero ?>" disabled>
                </div>
                <div class="col-md-9">
                  <table class="table table-bordered table-hover " id="miTabla">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Cantidad:</th>
                      <th scope="col">Total:</th>
                      <th scope="col">--</th>
                    </tr>
                  </table>
                </div>
                <div class="col-md-3 text-center">
                  <label for="">Total a Pagar</label><br>
                  <input type="number" class="form-control" id="total" name="nuevoTotalVenta" total=""
                    placeholder="00000">
                </div>
                <div class="col-md-4">
                  <label for="">Dinero a cuenta*</label>
                  <input type="number" class="form-control" value="0">
                </div>
                <div class="col-md-4">
                  <label for="">Resta:</label><br>
                  <input type="number" class="form-control" value="0">
                </div>
                <div class="col-md-4">
                  <label for="">Fecha de Entrega</label>
                  <input type="date" class="form-control">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End No Labels Form -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <script>
    function selectNit(e) {
      var nit = e.target.selectedOptions[0].getAttribute("data-nit")
      document.getElementById("nit").value = nit;
    }
    $(document).ready(function () {
      $('#adicionar').click(function () {

        var setCategoria = document.getElementById("categoria").value;
        var selectMar = document.getElementById("categoria");
        var categoria = selectMar.options[selectMar.selectedIndex].text;
        var precio = document.getElementById("nit").value;

        console.log(categoria);
        console.log(precio);
        var i = 1; //contador para asignar id al boton que borrara la fila
        var fila = '<tr id="row' + i + '">' +
          '<td>' + setCategoria + '</td>' +
          '<td>' + categoria + '</td>' +
          '<td><input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1"  stock="1" nuevoStock="'+Number(-1)+'"   required></td>' +
          '<td class="ingresoPrecio"><input  type="text" class="form-control nuevoPrecioProducto" precioReal="' + precio + '" value="' + precio + '" disabled></td>' +
          '<td><span name="remove" id="' + i + '" class="badge bg-success btn_remove">Quitar</button></td>' +
          '</tr>';
        i++;

        var totalPrecio = 0;
        var precioFila = parseFloat(precio);
        totalPrecio += precioFila;

        // Obtén una referencia al elemento en el que deseas agregar el contenido
        var inputElement = document.getElementById('total');

        // Agrega el contenido HTML utilizando innerHTML
        inputElement.value = totalPrecio;
        inputElement.setAttribute('precioReal', precio);

        $('#miTabla tr:first').after(fila);
        var nFilas = $("#miTabla tr").length;
        //le resto 1 para no contar la fila del header
        document.getElementById("categoria").value = "";
        document.getElementById("nit").value = "";
      });
      $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        //cuando da click obtenemos el id del boton
        $('#row' + button_id + '').remove(); //borra la fila
        var nFilas = $("#miTabla tr").length;
      });
    });
  </script>
  <script>
    $(".formularioVenta").on("change", "input.nuevaCantidadProducto", function () {

      var precio = $(this).parent().parent().find(".ingresoPrecio").children(".nuevoPrecioProducto");
      var precioFinal = $(this).val() * precio.attr("precioReal");

      precio.val(precioFinal);
      
      var nuevoStock = Number($(this).attr("stock")) - $(this).val();
      
      sumarPrecios();

    })

    function sumarPrecios() {

      var precioItem = $(".nuevoPrecioProducto");
      var arraySumaPrecio = [];

      for (var i = 0; i < precioItem.length; i++) {

        arraySumaPrecio.push(Number($(precioItem[i]).val()));
      }

      function sumaArrayPrecios(total, numero) {

        return total + numero;

      }

      var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);

      console.log(sumaTotalPrecio);
      

      $("#total").val(sumaTotalPrecio);
      $("#total").val(sumaTotalPrecio);
      $("#total").attr("total", sumaTotalPrecio); 


    }
  </script>




  <!-- Ventana Modal Control Pedidos -->
  <div class="modal fade" id="exampleModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Control de Pedidos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-borderless" id="delivery">
            <thead>
              <tr>
                <th scope="col">$ Folio de Nota</th>
                <th scope="col">$ Total</th>
                <th scope="col">Estatus</th>
                <th scope="col">Cliente</th>
                <th scope="col">Ver</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $consulta = "select * from ctl_catalogo cata
                                    join ctl_categorias cate ON cate.id_ctl_categorias = cata.id_ctl_categorias
                                    JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = cata.id_ctl_ventapedidos
                                    JOIN clientes cl ON cl.idCliente = cata.idCliente
                                    JOIN ctl_userSystem  emp ON emp.id_ctlUserSystem = cata.id_ctlUserSystem
                                    ORDER BY id_ctl_catalogo desc";
              $stmt = mysqli_query($conexion, $consulta);
              if (mysqli_num_rows($stmt) > 0) {
                while ($fila = mysqli_fetch_array($stmt)) {
                  $Estatus = $fila["estatus"];
                  ?>
                  <tr>
                    <th scope="row">
                      <?php echo $fila["folio_nota"]; ?>
                    </th>
                    <td>
                      <?php echo $fila["costoPagar"]; ?>
                    </td>
                    <td>
                      <span class="badge <?php echo ($Estatus == 'Pendiente') ? 'bg-warning' : 'bg-success' ?> text-dark">
                        <?php echo ($Estatus == 'Pendiente') ? "Pendiente" : "Entregado" ?>
                      </span>
                    </td>
                    <td>
                      <?php echo $fila["nombreCompleto"]; ?>
                    </td>
                    <td><a href="verNota.php?idPedido=<?php echo $fila["id_ctl_ventapedidos"] ?>"><span
                          class="badge bg-success"><i class="bi bi-eye-fill"></i></span></a></td>
                  </tr>
                  <?php
                }
              } else {
                ?>
                <h5 class="alert alert-danger">No hay registros en la base de datos</h5>
                <?php
              }
              mysqli_close($conexion);
              ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar </button>
        </div>
      </div>
    </div>
  </div>
  <!-- En Ventana Modal Control Pedidos -->

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
    /* ---------------------------------------------------*/

    $(function () {
      //$('select').selectpicker();
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
          "search": "Buscar:",
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
      tblDeliveryView = $("#delivery").DataTable({
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
      });
    }

  </script>

</body>

</html>