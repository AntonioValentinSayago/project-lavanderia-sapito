<?php

$mysqli= new mysqli("localhost","u551598332_root","#iSmT:[>8","u551598332_lavanderia_sap");
$mysqli->set_charset("utf8");
$consulta=$mysqli->prepare("SELECT ctl_reporte.fecha_reporte, ctl_reporte.ingreso_total_diario, ctl_reporte.id_ctl_ventapedidos, 
                            ped.folio_nota, ped.hora_entrega
                            from ctl_reporte_diarios ctl_reporte
                            JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = ctl_reporte.id_ctl_ventapedidos");
$consulta->execute();
$resultados=$consulta->get_result();
$productos=array();
while($row=$resultados->fetch_assoc()) $productos[]=$row;
$mysqli->close();

