<?php

$mysqli= new mysqli("localhost","u551598332_lavanderiasapi","D2!N!E~8a!","u551598332_lavanderiasapi");
$mysqli->set_charset("utf8");
$consulta=$mysqli->prepare("SELECT * FROM ctl_gastos");
$consulta->execute();
$resultados=$consulta->get_result();
$productos=array();
while($row=$resultados->fetch_assoc()) $productos[]=$row;
$mysqli->close();

