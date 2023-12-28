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
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Crear Nueva Nota</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pedidos-activos.php">
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
      <h1>Generar Nueva Venta</h1>
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
        <button type="button" class="btn"   style="background:#34d399; color:#f0fdf4" data-bs-toggle="modal" data-bs-target="#exampleModal"
          id="showTable"><i class="bi bi-eye-fill"></i> Lista de Precios</button>
      </div>
    </div><!-- End Page Title -->

    <!--Inicio del Section Principal-->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body mt-2">
              <h5 style="font-size:10px;padding:0px 0px 0px 0px">
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
              </h5>
              <hr>
              <!-- No Labels Form -->
              <form class="row g-3">
                <div class="col-md-4">
                  <label for="categoria">Lista de Categorías Disponibles</label>
                  <select class="form-control" type="text" onchange="selectNit(event)" id="categoria">
                    <option value="null" selected> - Seleccione una Opción - </option>
                    <?php
                    $consultaCategoria = "SELECT * FROM ctl_categorias";
                    $stmtCategoria = mysqli_query($conexion, $consultaCategoria);
                    if (mysqli_num_rows($stmtCategoria) > 0) {
                      while ($fila = mysqli_fetch_array($stmtCategoria)) {
                        ?>
                        <option data-nit="<?php echo $fila["precio"]; ?>" value="<?php echo $fila["id_ctl_categorias"]; ?>">
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
                  <label for="nit">PRECIO $</label>
                  <input type="number" class="form-control" id="nit" disabled>
                </div>
                <div class="col-md-4" >
                  <button type="button" class="btn btn-block" id="adicionar"  style="background:#34d399; color:#f0fdf4; width:100%">Agregar al Pedido</button>
                  <!-- <button type="reset" class="btn btn-secondary btn-block" style="background: #083344">Limpiar</button> -->
                </div>
              </form><!-- End No Labels Form -->
              <hr>
              <!-- No Labels Form method="POST" action="nuevaVenta.php"-->
              <form class="row g-3 formularioVenta" id="agregarVenta">
                <div class="col-md-9">
                  <label for="id_cliente">Clientes Disponibles</label>
                  <!-- data-live-search="true" data-live-search-style="startsWith" -->
                  <input type="hidden" value="<?php echo ucfirst($_SESSION['id']); ?>" id="idEmpleado">
                  <select class="form-control" type="text" id="id_cliente" required data-show-subtext="true" data-live-search="true">
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
                  <label for="">Número de Folio</label>
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
                <div class="col-md-10">
                  <table class="table table-bordered table-hover " id="miTabla">
                    <tr style="font-size:10px; font-weight: 900;color:black">
                      <!-- <td scope="col" >#</td> -->
                      <td scope="col" class="text-center">-</td>
                      <td scope="col">Producto</td>
                      <td scope="col">Cantidad o KG:</td>
                      <td scope="col">Total $:</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-2 text-center">
                  <label for="">Subtotal a Pagar</label><br>
                  <input type="number" class="form-control" id="total" total="" placeholder="00.00" disabled style="background-color: #cbd5e1; font-weight: 900;">
                </div>
                <div class="col-md-4">
                  <label for="">Dinero a cuenta*</label>
                  <input type="text" class="form-control restaCantidadProducto" required id="dineroCuenta"
                    placeholder="00.00">
                </div>
                <div class="col-md-4 ingresoRestaPrecio">
                  <label for="">Total:</label><br>
                  <input type="number" class="form-control restaPrecioProducto" id="resta" totalResta=""
                    placeholder="00.00" disabled style="background-color: #cbd5e1; font-weight: 900;">
                </div>
                <div class="col-md-4">
                  <label for="">Fecha de Entrega</label>
                  <input type="date" class="form-control" required id="fechaEntrega" min="<?php echo $date ?>">
                </div>
                <div class="col-md-4">
                  <label for="">Horario de Entrega:</label>
                  <select id="horaEntrega" class="form-control" required>
                    <option value="" select>Seleccione Horario....</option>
                    <option value="11:00am">11:00 am</option>
                    <option value="12:00pm">12:00 pm</option>
                    <option value="02:00pm">02:00 pm</option>
                    <option value="04:00pm">04:00 pm</option>
                    <option value="06:00pm">06:00 pm</option>
                    <option value="08:00pm">08:00 pm</option>
                  </select>
                </div>
                <div class="col-md-8">
                  <label for="descripcion">Observaciones:</label>
                  <input type="text" class="form-control" required id="obervaciones">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn" style="background:#34d399; color:#f0fdf4;"><i class="bi bi-save"></i> Crear Pedido</button>
                  <!-- <button type="button" class="btn" onclick="alertaMensaje()"  style="background:#34d399; color:#f0fdf4;" ><i class="bi bi-save"></i>
                    Crear y guardar Pedido</button> -->
                  <button type="reset" onclick="resetFormulario()" class="btn btn-default" style="background: #991b1b; color:white">
                      <i class="bi bi-trash3"></i> Cancelar Pedido
                  </button>
                </div>
              </form><!-- End No Labels Form -->
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
          '<td><span class="btn btn-danger btn-xs quitarProducto" idProducto="' + setCategoria + '"><i class="bi bi-trash"></i></span></td>' +
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
      $(document).on('click', '.quitarProducto', function () {
        var button_id = $(this).attr("idProducto");
        $(this).closest('tr').remove(); //borra la fila

        var nFilas = $("#miTabla tr").length;

        //restar la cantidad
        var precioSubTotal = document.getElementById('total').value;
        var precio1 = $(this).parent().parent().find(".ingresoPrecio").children(".nuevoPrecioProducto");
        var total = precioSubTotal - precio1.attr("precioReal");
        $("#total").val(total);

        let precioTotalVenta = document.getElementById('resta').value;
        let totalVenta = precioTotalVenta - precio1.attr("precioReal");
        $("#resta").val(totalVenta);


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
      var horaEntrega = document.getElementById("horaEntrega").value;
      var obervaciones = document.getElementById("obervaciones").value;
      var tabla = document.getElementById("miTabla");
      var valoresColumna = [];

      // Se valida de que existan productos en la venta
      if (total === '') {
        iziToast.warning({
          title: 'Error:',
          message: 'Debe agregar Productos a la Venta',
          position: 'topCenter',
          timeout: 2000,
        });
        return;
      }

      // Itera sobre las filas de la tabla (comenzando desde el índice 1 para omitir la cabecera)
      for (var i = 1; i < tabla.rows.length; i++) {
        var fila = tabla.rows[i];

        // Obtiene el texto de la primera celda de la fila
        //var celda = fila.cells[0];
        //var texto = celda.innerText;

        var setCategoria2 = fila.cells[0].querySelector('.quitarProducto').getAttribute('idProducto');

        var cantidad = fila.cells[2].querySelector(".nuevaCantidadProducto");;
        var textCana = cantidad.value;

        var objeto = {
          nombreCategoria: setCategoria2,
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
          valoresColumna: JSON.stringify(valoresColumna),
          dineroCuenta: dineroCuenta,
          resta: resta,
          fechaEntrega: fechaEntrega,
          horaEntrega: horaEntrega,
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
          <h5 class="modal-title" id="exampleModalLabel">LISTA DE PRECIOS</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-hover" id="example2">
            <thead style="background:#fed7aa;font-wight: 900">
              <tr>
                <th scope="col">Categoría Disponible</th>
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
                <h5 class="alert" style="background-color: #fbbf24; font-weight: 900;">No hay registros en la base de datos</h5>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal" style="background: #991b1b; color:white">Cerrar Ventana</button>
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