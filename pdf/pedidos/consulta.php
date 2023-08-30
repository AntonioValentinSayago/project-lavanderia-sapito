<?php

$mysqli= new mysqli("localhost","u551598332_root","#iSmT:[>8","u551598332_lavanderia_sap");
$mysqli->set_charset("utf8");
$consulta=$mysqli->prepare("SELECT * from ctl_historial");
$consulta->execute();
$resultados=$consulta->get_result();
$productos=array();
while($row=$resultados->fetch_assoc()) $productos[]=$row;
$mysqli->close();

