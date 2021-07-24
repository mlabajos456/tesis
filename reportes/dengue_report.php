<?php

header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=reporte.xls");
header("Pragma: no-cache");
header("Expires: 0");
$raiz = '../docs/';

include_once($raiz . 'class/head.php');

include_once($raiz . 'class/utilitario.php');


$formato = new utilitariophp();
$cons = "SELECT c.id_dengue, r.usuario, p.nombre, p.apellido_paterno, p.apellido_materno, p.dni,
c.fecha_registro, reg.nombre as regnombre, reg.apellido_paterno as regpaterno, reg.apellido_materno as regmaterno,
c.tiempo_recoleccion, c.tiempo_diseminacion
from t_dengue c
LEFT join t_paciente p on p.id_persona = c.id_paciente
INNER join t_registrador r on c.id_registrador = r.id_registrador
LEFT join t_paciente reg on reg.id_persona = r.id_persona";
$val = $sql->consulta($cons);



?>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<table border="1">
  <tr>
    <th>Paciente</th>
    <th>DNI</th>
    <th>Registrador</th>
    <th>Tiempo Recolección</th>
    <th>Tiempo diseminación</th>
    <th>Fecha registro</th>
  </tr>
  <?php
  foreach ($val as $r) {


  ?>
    <tr>
      <td><?php echo $r['nombre'] . ' ' . $r['apellido_paterno']; ?></td>
      <td><?php echo $r['dni']; ?></td>
      <td><?php echo $r['regnombre'] . ' ' . $r['regpaterno']; ?></td>
      <td><?php echo $r['tiempo_recoleccion']; ?></td>
      <td><?php echo $r['tiempo_diseminacion']; ?></td>
      <td><?php echo $r['fecha_registro']; ?></td>
    </tr>

  <?php
 };
  ?>
</table>