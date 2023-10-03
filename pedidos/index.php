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
      <h1>Panel de Pedidos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"></a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </nav>
      <div style="margin-left: auto;">
        <a href="../clientes/addCliente.php"><button type="button" class="btn btn-primary btn-add"><i
              class="bi bi-person-fill-add"></i> Nuevo
            Cliente</button></a>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
          id="showTable"><i class="bi bi-eye-fill"></i> Lista de Precios</button>
      </div>
    </div><!-- End Page Title -->

    <!--Inicio del Section Principal-->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-5">
          <div class="row">
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body mt-2">
                  <h5 style="font-size:10px;padding:0px 0px 0px 0px">
                    <?php date_default_timezone_set("America/Mexico_City");
                    echo date('d \d\e F \d\e Y'); ?>
                  </h5>
                  <hr>
                  <!-- No Labels Form -->
                  <form class="row g-3">
                    <div class="col-md-8">
                      <label for="">Categoría</label>
                      <select class="form-control" type="text" onchange="selectNit(event)" id="categoria">
                        <option value="null" selected>Seleccione una Opción</option>
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
                    <div class="col-md-4">
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
        <div class="col-lg-7">
          <div class="card recent-sales overflow-auto">
            <div class="card-body mt-2">
              <h5 style="font-size:10px;padding:0px 0px 0px 0px">
                <?php date_default_timezone_set("America/Mexico_City");
                $date = date("d-m-Y"); // Establece la configuración regional en español para México
                echo $fecha = date('Y-m-d', strtotime($date)); ?>
              </h5>
              <hr>
              <!-- No Labels Form method="POST" action="nuevaVenta.php"-->
              <form class="row g-3 formularioVenta" id="agregarVenta">
                <div class="col-md-9">
                  <label for="id_cliente">Cliente</label>
                  <!-- data-live-search="true" data-live-search-style="startsWith" -->
                  <input type="hidden" value="<?php echo ucfirst($_SESSION['id']); ?>" id="idEmpleado">
                  <select class="form-control" type="text" id="id_cliente" required>
                    <option value="">Seleccione Cliente...</option>
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
                  <?php
                  //$numero = random_int(1, 99);
                  //$letra_aleatoria = chr(rand(65, 90));
                  $consultaFolioNota = "SELECT * FROM config_folios ORDER BY ultimo_folio DESC LIMIT 1";
                  $stmtFolioNota = mysqli_query($conexion, $consultaFolioNota);
                  if (mysqli_num_rows($stmtFolioNota) > 0) {
                    while ($fila = mysqli_fetch_array($stmtFolioNota)) {
                      $folio_incremento = $fila["ultimo_folio"] + 1;
                      ?>
                      <input type="text" class="form-control" value="<?php echo $folio_incremento ?>" disabled
                        id="folioNota">
                      <?php
                    }
                  } else {
                    ?>
                    <input type="text" class="form-control" value="1" disabled id="folioNota">
                    <?php
                  }
                  ?>
                </div>
                <div class="col-md-9">
                  <table class="table table-bordered table-hover " id="miTabla">
                    <tr style="font-size:10px; font-weight: 900;color:black">
                      <!-- <td scope="col" >#</td> -->
                      <td scope="col">Nombre</td>
                      <td scope="col">Cantidad o KG:</td>
                      <td scope="col">Total:</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-3 text-center">
                  <label for="">Subtotal a Pagar</label><br>
                  <input type="number" class="form-control" id="total" total="" placeholder="00.00" disabled>
                </div>
                <div class="col-md-4">
                  <label for="">Dinero a cuenta*</label>
                  <input type="text" class="form-control restaCantidadProducto" required id="dineroCuenta"
                    placeholder="00.00">
                </div>
                <div class="col-md-4 ingresoRestaPrecio">
                  <label for="">Total:</label><br>
                  <input type="number" class="form-control restaPrecioProducto" id="resta" totalResta=""
                    placeholder="00.00" disabled>
                </div>
                <div class="col-md-4">
                  <label for="">Fecha de Entrega</label>
                  <input type="datetime-local" class="form-control" required id="fechaEntrega"
                    min="<?php echo $date ?>">
                </div>
                <div class="col-md-4">
                  <label for="">Horario de Entrega:</label>
                  <select name="hora-entrega" id="hora-entrega" class="form-control">
                  <option value="11:00am">11:00 am</option>
                    <option value="11:00am">12:00 pm</option>
                    <option value="11:00am">02:00 pm</option>
                    <option value="11:00am">04:00 pm</option>
                    <option value="11:00am">06:00 pm</option>
                    <option value="11:00am">08:00 pm</option>
                  </select>
                </div>
                <div class="col-md-8">
                  <label for="descripcion">Observaciones:</label>
                  <input type="text" class="form-control" required id="obervaciones">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Crear Pedido</button>
                  <button type="reset" onclick="resetFormulario()" class="btn btn-danger"><i
                      class="bi bi-trash3"></i></button>
                </div>
              </form><!-- End No Labels Form -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <p>Cartera de Pedidos</p>
                  <hr>
                  <table class="table table-borderless" id="example1">
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
                            <th scope="row">
                              <?php echo $fila["folio_nota"]; ?>
                            </th>
                            <td>
                              <?php echo $fila["costoPagar"]; ?>
                            </td>
                            <td>
                              <span
                                class="badge <?php echo ($Estatus == 'Pendiente') ? 'bg-warning' : 'bg-success' ?> text-dark">
                                <?php echo ($Estatus == 'Pendiente') ? "Pendiente" : "Entregado" ?>
                              </span>
                            </td>
                            <td>
                              <?php echo $fila["nombreCliente"]; ?>
                            </td>
                            <td>
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
                        <h5 class="alert alert-danger">No hay registros en la base de datos</h5>
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

        if (precio === '') {
          iziToast.warning({
            title: 'Error:',
            message: 'Debe agregar una opción Valida',
            position: 'topCenter',
            timeout: 2000,
          });
          return;
        }

        var i = 1; //contador para asignar id al boton que borrara la fila
        var fila =
          '<tr id="row' + i + '">' +
          '<th style="color:blue; display:none">' + setCategoria + '</th>' +
          '<td>' + categoria + '</td>' +
          '<td><input type="number" step="any" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="0" value="1"  stock="1" nuevoStock="' + Number(-1) + '"   required></td>' +
          '<td class="ingresoPrecio"><input  type="text" class="form-control nuevoPrecioProducto" precioReal="' + precio + '" value="' + precio + '" disabled></td>' +
          '</tr>';
        i++;
        var totalPrecio = 0;
        var precioFila = parseFloat(precio);
        totalPrecio += precioFila;

        var inputElement = document.getElementById('total');
        // Agrega el contenido HTML utilizando innerHTML
        inputElement.value = totalPrecio;
        inputElement.setAttribute('precioReal', precio);

        // Obtén una referencia al elemento en el que deseas agregar el contenido
        var inputElementResta = document.getElementById('resta');
        inputElementResta.value = totalPrecio;
        inputElementResta.setAttribute('precioReal', precio);

        //le resto 1 para no contar la fila del header
        $('#miTabla tr:first').after(fila);
        var nFilas = $("#miTabla tr").length;
        document.getElementById("categoria").value = "";
        document.getElementById("nit").value = "";

        setTimeout(() => {
          sumarPrecios();
        }, 500);

      });


      //Remover la categoría de la venta
      $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        //cuando da click obtenemos el id del boton
        $('#row' + button_id + '').remove(); //borra la fila
        var nFilas = $("#miTabla tr").length;

        //restar la cantidad
        var precioSubTotal = document.getElementById('total').value;
        var precio1 = $(this).parent().parent().find(".ingresoPrecio").children(".nuevoPrecioProducto");
        var total = precioSubTotal - precio1.attr("precioReal");
        $("#total").val(total);

        var precioTotal = document.getElementById('resta').value;
        var precio2 = $(this).parent().parent().find(".ingresoRestaPrecio").children(".restaPrecioProducto");
        var precioFinal2 = precioTotal - precio2.attr("precioReal")
        $("#resta").val(precioFinal2);


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

      $("#total").val(sumaTotalPrecio);
      $("#total").attr("total", sumaTotalPrecio);

      $("#resta").val(sumaTotalPrecio);
      $("#resta").attr("totalResta", sumaTotalPrecio);
    }
    /*
      ********************************************************************
        RESTAR CANTIDAD DEL PRODUCTO
      ********************************************************************
    */

    $(".formularioVenta").on("change", "input.restaCantidadProducto", function () {

      var precio = $(this).parent().parent().find(".ingresoRestaPrecio").children(".restaPrecioProducto");
      var precioFinal = precio.val() - $(this).val()
      precio.val(precioFinal);

    })

  </script>
  <script>
    $('#agregarVenta').submit(function (e) {
      e.preventDefault(); // Evita el envío del formulario estándar
      var botton = document.getElementById("agregarVenta");
      botton.disabled = true;

      // Obtén los valores de los campos
      var idEmpleado = document.getElementById("idEmpleado").value;
      var cliente = document.getElementById("id_cliente").value;
      var folioNota = document.getElementById("folioNota").value;
      var total = document.getElementById("total").value;
      var dineroCuenta = document.getElementById("dineroCuenta").value;
      var resta = document.getElementById("resta").value;
      var fechaEntrega = document.getElementById("fechaEntrega").value;
      var obervaciones = document.getElementById("obervaciones").value;
      var tabla = document.getElementById("miTabla");
      var valoresColumna = [];


      // Itera sobre las filas de la tabla (comenzando desde el índice 1 para omitir la cabecera)
      for (var i = 1; i < tabla.rows.length; i++) {
        var fila = tabla.rows[i];

        // Obtiene el texto de la primera celda de la fila
        var celda = fila.cells[0];
        var texto = celda.innerText;

        var cantidad = fila.cells[2].querySelector(".nuevaCantidadProducto");;
        var textCana = cantidad.value;

        var objeto = {
          nombreCategoria: texto,
          cantidad: textCana
        }

        valoresColumna.push(objeto);
        //valoresColumna.push(textCana);
      }
      // Realiza la solicitud AJAX
      $.ajax({
        url: 'nuevoPedido.php', // Ruta al archivo PHP que realizará la inserción
        method: 'POST', // Método de envío de datos
        data: {
          idEmpleado: idEmpleado,
          cliente: cliente,
          folioNota: folioNota,
          total: total,
          valoresColumna: valoresColumna,
          dineroCuenta: dineroCuenta,
          resta: resta,
          fechaEntrega: fechaEntrega,
          obervaciones: obervaciones
        }, // Datos a enviar
        success: function (response) {
          // Maneja la respuesta del servidor
          let formulario = document.getElementById('agregarVenta');
          formulario.reset();

          var tabla = document.getElementById("miTabla");
          var filas = tabla.getElementsByTagName("tr");

          // Comenzar desde la segunda fila (índice 1) para omitir el encabezado
          for (var i = filas.length - 1; i > 0; i--) {
            tabla.deleteRow(i);
          }
          var botton = document.getElementById("agregarVenta");
          botton.disabled = true;
          botton.innerHTML = "<div class='alert alert-warning' role='alert'>Guardando Pedido!</div>";

          iziToast.success({
            title: 'OK',
            message: 'Nota Realizada Correctamente',
            position: 'center',
            timeout: 2500,
          });
          // Puedes mostrar una notificación o redirigir a otra página después de la inserción
          setTimeout(function () {
            window.open('vendor/ticket.php', '_blank');
            location.reload();
          }, 2200);

        },
        error: function (xhr, status, error) {
          // Maneja los errores de la solicitud AJAX
          console.log("Error: " + xhr.status)
          console.error(error);
        }
      });
    });

    function resetFormulario() {
      let formulario = document.getElementById('agregarVenta');
      formulario.reset();

      var tabla = document.getElementById("miTabla");
      var filas = tabla.getElementsByTagName("tr");

      // Comenzar desde la segunda fila (índice 1) para omitir el encabezado
      for (var i = filas.length - 1; i > 0; i--) {
        tabla.deleteRow(i);
      }
    }

  </script>


  <!-- Modal -->
  <div class="modal modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lista de Precios</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-hover" id="example2">
            <thead style="background:#EABCB3;">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">$ Precio</th>
              </tr>
            </thead>
            <tbody style="color:black;" class="text-center">
              <?php
              $consultaCategoria = "SELECT * FROM ctl_categorias ORDER BY id_ctl_categorias DESC";
              $stmtCategoria = mysqli_query($conexion, $consultaCategoria);
              if (mysqli_num_rows($stmtCategoria) > 0) {
                while ($fila = mysqli_fetch_array($stmtCategoria)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $fila["nombreCategoria"]; ?>
                    </td>
                    <td>
                      $
                      <?php echo $fila["precio"]; ?>
                    </td>
                  </tr>
                  <?php
                }
              } else {
                ?>
                <h5 class="alert alert-danger">No hay registros en la base de datos</h5>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
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