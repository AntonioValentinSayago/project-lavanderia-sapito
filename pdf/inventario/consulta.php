<?php

$mysqli= new mysqli("localhost","root","123456789","lavanderia_sapito");
$mysqli->set_charset("utf8");
$consulta=$mysqli->prepare("SELECT * FROM inventario");
$consulta->execute();
$resultados=$consulta->get_result();
$productos=array();
while($row=$resultados->fetch_assoc()) $productos[]=$row;
$mysqli->close();

