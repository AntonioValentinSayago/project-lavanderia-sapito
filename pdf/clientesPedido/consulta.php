<?php

$mysqli= new mysqli("localhost","u551598332_lavanderiasapi","D2!N!E~8a!","u551598332_lavanderiasapi");
$mysqli->set_charset("utf8");
$consulta=$mysqli->prepare("SELECT DISTINCT cl.nombreCompleto,cl.idCliente,estatus,direccion,folio_nota, 
                            ped.costoPagar,ped.fecha_entrega,
                            users.nombreCompleto as NombreEmpleado, users.email_correo
                                FROM ctl_catalogo cata
                                JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = cata.id_ctl_ventapedidos
                                JOIN clientes cl ON cl.idCliente = cata.idCliente
                                JOIN ctl_usersystem users on users.id_ctlUserSystem = cata.id_ctlUserSystem");
$consulta->execute();
$resultados=$consulta->get_result();
$productos=array();
while($row=$resultados->fetch_assoc()) $productos[]=$row;
$mysqli->close();

