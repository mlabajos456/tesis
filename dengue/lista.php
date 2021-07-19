<?php

$raiz = '../docs/';

include_once($raiz . 'class/head.php');

include_once($raiz . 'class/utilitario.php');

$formato = new utilitariophp();

//$dato6=$_GET['fecha'];

//$dato0=$_GET['fecha1'];



//$filtro1 = ($dato6!=0 and $dato0!=0 )?"where dato6 between '$dato6' and '$dato0'":'where dato6<>0';



$cons = "SELECT c.id_dengue, c.id_paciente, c.id_registrador, c.longitud, c.latitud, r.usuario, p.nombre, p.apellido_paterno, p.apellido_materno, p.dni, c.fecha_registro

  from t_dengue c
  INNER JOIN t_paciente p on p.id_persona = c.id_paciente
  INNER join t_registrador r on c.id_registrador = r.id_registrador";





$val = $sql->numRegistros($cons);

?>

<!--notificaciones-->

<link rel="stylesheet" href="<?php echo $raiz; ?>assets/libs/css/style.css">

<!--check--->

<!--<script src="<?php echo $raiz; ?>js/misc.js"></script>-->

<!--paginado-->

<script src="<?php echo $raiz; ?>vendors/datatables.net/jquery.dataTables.js"></script>

<script src="<?php echo $raiz; ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>

<script src="<?php echo $raiz; ?>js/data-table.js"></script>

<!--fin paginado-->

<div class="col-12">



  <?php

  if ($val > 0) {

  ?>

    <div class="table-responsive">

      <table id="order-listing" class="table">

        <thead>

          <tr class="bg-white text-black">
            <th>Nombre y Apellido</th>
            <th>DNI</th>
            <th><i class="fa fa-tags"></i> Fecha Registro</th>
            <th><i class="fa fa-cog"></i> acción</th>
          </tr>

        </thead>

        <tbody>
          <?php
          $linea = $sql->consulta($cons);
          foreach ($linea as $r) {
            $fecha = $r['fecha_registro'];

            $date = new DateTime($fecha);

          ?>

            <tr>

              <td><?= $r['nombre'] . ' ' . $r['apellido_paterno'] . ' ' . $r['apellido_materno'] ?></td>

              <td><?= $r['dni'] ?></td>

              <td><?= $date->format('d/m/Y : H:m:s') ?></td>

              <td>

                <a href="modificar.php?id_articulo=<?php echo $r['id_dengue'] ?>"> <button type="button" name="editar" id="editar" class="btn btn-outline-warning" onclick="change_pic('<?= $r["imagen"] ?>')">

                    <i class="fa fa-edit"></i>

                  </button></a>

                <button type="button" class="btn btn-outline-danger" onclick="showSwal('swalEliminar','<?php echo $r[0] ?>')">

                  <i class="fa fa-trash"></i>

                </button>

              </td>

            </tr>

          <?php

          } ?>

        </tbody>

      </table>

    </div>

  <?php

  } else {

  ?>

    <div class="alert alert-info" role="alert">

      <p><i class="mdi mdi-alert-circle"></i> No se encontraron Registros en la tabla solicitada.</p>

      <p>
      <p><i class="fa fa-check"></i> Para comenzar a ingresar registros dar 'click' en el botón 'Nuevo' de la parte superior.</p>

    </div>

  <?php

  }

  ?>

</div>