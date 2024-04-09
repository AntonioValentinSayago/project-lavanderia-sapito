<?php

// Establecer la zona horaria a la Ciudad de México
date_default_timezone_set('America/Mexico_City');
$fecha_actual = date('Y-m-d 00:00:00');

$mysqli= new mysqli("localhost","u551598332_root","#iSmT:[>8","u551598332_lavanderia_sap");
$mysqli->set_charset("utf8");
$consulta=$mysqli->prepare("SELECT ctl_reporte.fecha_reporte, ctl_reporte.ingreso_total_diario, ctl_reporte.id_ctl_ventapedidos, 
                            ped.folio_nota, ped.hora_entrega, ped.obervaciones
                            from ctl_reporte_diarios ctl_reporte
                            JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = ctl_reporte.id_ctl_ventapedidos
                            WHERE DATE(ctl_reporte.fecha_reporte) = ?"   
                        );

$consulta->bind_param('s', $fecha_actual);
$consulta->execute();
$resultados=$consulta->get_result();
$productos=array();
while($row=$resultados->fetch_assoc()) $productos[]=$row;
$mysqli->close();

