<?php

header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=reporte.xls");
header("Pragma: no-cache");
header("Expires: 0");
$raiz = '../docs/';

include_once($raiz . 'class/head.php');

include_once($raiz . 'class/utilitario.php');


$formato = new utilitariophp();
$cons = "SELECT c.id_covid, c.id_paciente,
c.id_registrador, c.id_tipo_prueba, c.prueba_rapida,c.longitud, c.latitud, r.usuario, p.nombre,
p.apellido_paterno, p.apellido_materno, p.dni, tp.descripcion, c.fecha_registro, reg.nombre as regnombre, 
reg.apellido_paterno as regpaterno,
c.tiempo_recoleccion, c.tiempo_diseminacion
from t_covid c
INNER JOIN t_paciente p on p.id_persona = c.id_paciente
INNER join t_registrador r on c.id_registrador = r.id_registrador
LEFT join t_paciente reg on reg.id_persona = r.id_persona
INNER join t_tipo_prueba tp on tp.id_tipo_prueba = c.id_tipo_prueba";
$val = $sql->consulta($cons);



?>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />

<table>

    <thead>

      <tr>

        <th rowspan="2" colspan="2" align="center" valign="center" style="margin-top: 50px;"><img src="https://forums.ni.com/t5/image/serverpage/image-id/189226i90BE0828D316C8F9/image-size/original?v=v2&px=-1" width="100" height="100"></th>

        <th colspan="3"><br><br></th>

        <th rowspan="2" colspan="2">24/07/2021</th>

      </tr>
      <tr>
        <th colspan="3">
          <h1>Municiapalidad provincial de moyobamba</h1> <br> Siempre a tu servicio
        </th>
      </tr>
    </thead>

</table>
<table border="1">

  <tr>
    <th>Paciente</th>
    <th>DNI</th>
    <th>Resultado de Prueba</th>
    <th>Registrador</th>
    <th>Tiempo Recolección</th>
    <th>Tiempo diseminación</th>
    <th>Fecha registro</th>
  </tr>
  <?php
  foreach ($val as $r) {
    $prueba = $r['prueba_rapida'] == 0 ? 'Negativo' : 'Positivo';

  ?>
    <tr>
      <td><?php echo $r['nombre'] . ' ' . $r['apellido_paterno']; ?></td>
      <td><?php echo $r['dni']; ?></td>
      <td><?php echo $prueba; ?></td>
      <td><?php echo $r['regnombre'] . ' ' . $r['regpaterno']; ?></td>
      <td><?php echo $r['tiempo_recoleccion']; ?></td>
      <td><?php echo $r['tiempo_diseminacion']; ?></td>
      <td><?php echo $r['fecha_registro']; ?></td>
    </tr>

  <?php
  };
  ?>
</table>