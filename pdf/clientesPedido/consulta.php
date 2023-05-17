<?php

$mysqli= new mysqli("localhost","root","123456789","lavanderia_sapito");
$mysqli->set_charset("utf8");
$consulta=$mysqli->prepare("SELECT DISTINCT cl.nombreCompleto,cl.idCliente,estatus,direccion,folio_nota, 
                            ped.costoPagar,ped.fecha_entrega,
                            users.nombreCompleto as NombreEmpleado, users.email_correo
                                FROM ctl_catalogo cata
                                JOIN ctl_ventapedidos ped ON ped.id_ctl_ventapedidos = cata.id_ctl_ventapedidos
                                JOIN clientes cl ON cl.idCliente = cata.idCliente
                                JOIN ctl_userSystem users on users.id_ctlUserSystem = cata.id_ctlUserSystem");
$consulta->execute();
$resultados=$consulta->get_result();
$productos=array();
while($row=$resultados->fetch_assoc()) $productos[]=$row;
$mysqli->close();

