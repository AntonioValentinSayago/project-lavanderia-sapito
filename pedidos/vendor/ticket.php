<?php
    require_once("../../config/db_config.php");
    session_start();
    date_default_timezone_set('America/Mexico_City');
    $empleado = "Cajero: ".ucfirst($_SESSION['nombre']);
	# Incluyendo librerias necesarias #
    require "code128.php";
    require 'vendor-ticket/autoload.php'; 
    use Picqer\Barcode\BarcodeGeneratorPNG;
    use setasign\Fpdi\Fpdi;


    $pdf = new PDF_Code128('P','mm',array(80,130));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Lavandería Sapito")),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y", strtotime(date('Y-m-d')))." ".date('H:i:s')),0,'C',false);
    //$pdf->MultiCell(0,5,utf8_decode("Caja Nro: 1"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode($empleado),0,'C',false);
    $pdf->SetFont('Arial','B',10);

    //$numero = random_int(1, 99);
    //$letra_aleatoria = chr(rand(65, 90));
    $ultimoId = mysqli_insert_id($conexion);
    $consultaFolioNota = "SELECT * FROM ctl_ventapedidos ORDER BY folio_nota DESC LIMIT 1";
    $stmtFolioNota= mysqli_query($conexion, $consultaFolioNota);
    if (mysqli_num_rows($stmtFolioNota) > 0) {
      while ($fila = mysqli_fetch_array($stmtFolioNota)) {  
        $numeroTicket = "Ticket No°: ". $fila["folio_nota"];
        $pdf->MultiCell(0,5,utf8_decode($numeroTicket),0,'C',false);
        }
    } else {
    
        $pdf->MultiCell(0,5,mb_convert_encoding( "Ticket No°: 0",'ISO-8859-1', 'UTF-8'),0,'C',false);

      }
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,mb_convert_encoding("-------------------------------------------------------------------",'ISO-8859-1', 'UTF-8'),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(19,5,mb_convert_encoding("Desc.",'ISO-8859-1', 'UTF-8'),0,0,'C');
    $pdf->Cell(51,5,mb_convert_encoding("Precio",'ISO-8859-1', 'UTF-8'),0,0,'R');


    $pdf->Ln(3);
    $pdf->Cell(72,5,mb_convert_encoding("-------------------------------------------------------------------",'ISO-8859-1', 'UTF-8'),0,0,'C');
    $pdf->Ln(4);

    $consultaFolioNota = "SELECT * FROM ctl_ventapedidos ORDER BY folio_nota DESC LIMIT 1";
    $stmtFolioNota= mysqli_query($conexion, $consultaFolioNota);
    $ultimoRegistro = mysqli_fetch_assoc($stmtFolioNota);
    $folioNota = $ultimoRegistro['folio_nota'];

    $tabla = "ctl_ventapedidos";
    $consultaUltimoID = "SELECT MAX(id_ctl_ventapedidos) AS ultimo_id FROM $tabla";
    $resultadoUltimoID = mysqli_query($conexion, $consultaUltimoID);
    $filaUltimoID = mysqli_fetch_assoc($resultadoUltimoID);
    $ultimoID = $filaUltimoID['ultimo_id'];
    $consulta = "SELECT ped.folio_nota, ped.estatus, ped.dineroCuenta,ped.dineroPendiente, ped.costoPagar,ped.fecha_entrega,ped.hora_entrega,
    cate.nombreCategoria,
    cl.nombreCompleto as nombreCliente, cl.direccion,cl.telefono, 
    emp.nombreCompleto as nombreEmpleado
                        FROM ctl_catalogo cata
                        JOIN ctl_categorias cate ON cate.id_ctl_categorias = cata.id_ctl_categorias
                        JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = cata.id_ctl_ventapedidos
                        JOIN clientes cl ON cl.idCliente = cata.idCliente
                        JOIN ctl_usersystem  emp ON emp.id_ctlUserSystem = cata.id_ctlUserSystem
                        WHERE cata.id_ctl_ventapedidos = $ultimoID
                        LIMIT 1
                        ";
    $stmt = mysqli_query($conexion, $consulta);
    /*----------  Detalles de la tabla  ----------*/
    if (mysqli_num_rows($stmt) > 0){
        while($fila = mysqli_fetch_array($stmt)){
            $total_pagar = "$ ".$fila["costoPagar"]; 
            $consultaCate = "SELECT nombreCategoria, precio from ctl_catalogo cata
                inner join ctl_categorias cate ON cate.id_ctl_categorias = cata.id_ctl_categorias
                where cata.id_ctl_ventapedidos = $ultimoID;";
                     $stmtCate = mysqli_query($conexion, $consultaCate);
                if (mysqli_num_rows($stmtCate) > 0) {
                     while ($filaCate = mysqli_fetch_array($stmtCate)) {
                         $pdf->Cell(18,5,mb_convert_encoding("", 'ISO-8859-1', 'UTF-8'),0,0,'C');
                         $nombreProductos = $filaCate["nombreCategoria"];                                                   
                         $precioProductos = "$ ".$filaCate["precio"];                                                   
                         $pdf->Cell(10,4,mb_convert_encoding($nombreProductos, 'ISO-8859-1', 'UTF-8'),0,0,'C');
                         $pdf->Cell(39,4,mb_convert_encoding($precioProductos,'ISO-8859-1', 'UTF-8'),0,0,'R');
                         $pdf->Ln(4);
                                                   
                    }
                }                                                

                 $fechaEntrega = "Fecha de entrega: ". $fila["fecha_entrega"] . " ".$fila["hora_entrega"]; 
                 $pdf->Ln(3);
                 $pdf->MultiCell(0,4,mb_convert_encoding($fechaEntrega, 'ISO-8859-1', 'UTF-8'),0,'C',false);
                 $pdf->Ln(1);
                 $pdf->Cell(72,5,mb_convert_encoding("-------------------------------------------------------------------", 'ISO-8859-1', 'UTF-8'),0,0,'C');
                 
                 $pdf->Ln(5);
                 $dineroCuenta = "$ ".$fila["dineroCuenta"];
                $pdf->Cell(18,5,mb_convert_encoding("", 'ISO-8859-1', 'UTF-8'),0,0,'C');
                $pdf->Cell(22,5,mb_convert_encoding("Dinero a Cuenta:", 'ISO-8859-1', 'UTF-8'),0,0,'C');
                $pdf->Cell(32,5,mb_convert_encoding($dineroCuenta, 'ISO-8859-1', 'UTF-8'),0,0,'C');

                $pdf->Ln(5);
                $dineroPendiente = "$ ".$fila["dineroPendiente"];
                $pdf->Cell(18,5,mb_convert_encoding("", 'ISO-8859-1', 'UTF-8'),0,0,'C');
                $pdf->Cell(22,5,mb_convert_encoding("Resta:", 'ISO-8859-1', 'UTF-8'),0,0,'C');
                $pdf->Cell(32,5,mb_convert_encoding($dineroPendiente, 'ISO-8859-1', 'UTF-8'),0,0,'C');

                            
                $pdf->Ln(5);
                $totalPagar = "$" .$fila["costoPagar"];
                $pdf->Cell(18,5,mb_convert_encoding("", 'ISO-8859-1', 'UTF-8'),0,0,'C');
                $pdf->Cell(22,5,mb_convert_encoding("Tota:", 'ISO-8859-1', 'UTF-8'),0,0,'C');
                $pdf->Cell(32,5,mb_convert_encoding($totalPagar, 'ISO-8859-1', 'UTF-8'),0,0,'C');
                
                $pdf->Ln(5);
                $pdf->SetFont('Arial','B',9);
                $pdf->Cell(0,7,mb_convert_encoding("Gracias por su compra", 'ISO-8859-1', 'UTF-8'),'',0,'C');

                $pdf->Ln(5);
                # Codigo de barras #
                $generator = new BarcodeGeneratorPNG();
                $folioNotaCodigo = $fila["folio_nota"];
                $barcode = $generator->getBarcode($folioNotaCodigo, $generator::TYPE_CODE_128);       

                $pdf->Code128(5,$pdf->GetY(),$folioNotaCodigo,70,10);
                $pdf->SetXY(0,$pdf->GetY()+12);
                $pdf->SetFont('Arial','',10);
                $pdf->MultiCell(0,0,mb_convert_encoding($folioNotaCodigo, 'ISO-8859-1', 'UTF-8'),0,'C',false);

                $pdf->Output();
        }
    }else{
        $pdf->Cell(10,4,mb_convert_encoding("No hay Información que mostrar", 'ISO-8859-1', 'UTF-8'),0,0,'C');
        $pdf->Output("I","Ticket_Nro_1.pdf",true);
    }
    /*----------  Fin Detalles de la tabla  ----------*/
