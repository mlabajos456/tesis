<?php
$raiz = '../docs/';
include_once($raiz . 'class/head.php');
include_once($raiz . 'class/utilitario.php');
$formato = new utilitariophp();
$cons = "SELECT m.id_persona,m.nombre,m.apellido_paterno,m.apellido_materno,m.dni, m.fecha_nac, m.estado_civil,m.domicilio, m.sexo,m.telefono from t_paciente m
     order by m.id_persona desc";
$val = $sql->numRegistros($cons);
?>
<!--notificaciones-->
<link rel="stylesheet" href="<?php echo $raiz; ?>assets/libs/css/style.css">
<!--check--->

<!--paginado-->
<script src="<?php echo $raiz; ?>vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?php echo $raiz; ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?php echo $raiz; ?>js/data-table.js"></script>
<!--fin paginado
<td><img src="<?php echo  $raiz . '../../upload/autores/' . $r['imagen'] ?>" width="70" height="70">
-->
<div class="col-12">

  <?php
  if ($val > 0) {
  ?>
    <div class="table-responsive">
      <table id="order-listing" class="table">
        <thead>
          <tr class="bg-primary text-light">
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Dni</th>
            <th>Fecha Nacimiento</th>
            <th>Estado Civil</th>
            <th>Sexo</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $cont = 0;
          $linea = $sql->consulta($cons);
          while ($r = $sql->fetch_array($linea)) {
            $sexo = $r['sexo'] == 1 ? 'Hombre' : 'Mujer';
            $estado_civil = '';
            if ($r['estado_civil'] == 1) {
              $estado_civil = 'Soltero';
            } else if (
              $r['estado_civil'] == 2
            ) {
              $estado_civil = 'Casado';
            } else if ($r['estado_civil'] == 4) {
              $estado_civil = 'Divorciado';
            } else if ($r['estado_civil'] == 3) {
              $estado_civil = 'Viudo';
            }
            $fecha = $r['fecha_nac'];
            $date = new DateTime($fecha);


          ?>
            <tr>
              <td><?= $r['id_persona'] ?></td>

              <td><?= ($r['nombre'] . ' ' . $r['apellido_paterno'] . ' ' . $r['apellido_materno']) ?></td>
              <td><?= ($r['dni']) ?></td>
              <td><?php echo $date->format('d/m/Y'); ?></td>
              <td><?= ($estado_civil) ?></td>
              <td><?= ($sexo) ?></td>
              <td>
                <button title="Editar" type="button" class="btn btn-warning" data-toggle="modal" 
                data-target="#dataUpdate" data-id_persona="<?php echo $r['id_persona'] ?>"
                 data-nombre="<?php echo $r['nombre'] ?>" data-dni="<?php echo $r['dni'] ?>" 
                 data-apellido_paterno="<?php echo $r['apellido_paterno'] ?>" data-apellido_materno="<?php echo $r['apellido_materno'] ?>"
                 data-fecha_nac="<?php echo $r['fecha_nac'] ?>" data-telefono="<?php echo $r['telefono'] ?>"
                 data-estado_civil="<?php echo $r['estado_civil'] ?>"
                 data-sexo="<?php echo $r['sexo'] ?>"
                 data-domicilio="<?php echo $r['domicilio'] ?>"
                 >
                  <i class="fa fa-edit"></i>
                </button>
                <!--   <button type="button" class="btn btn-outline-danger" onclick="showSwal('swalEliminar','<?php echo $r[0] ?>')">
                  <i class="fa fa-trash"></i>
                </button>  -->
              </td>
            </tr>
          <?php
            $cont++;
          } ?>
        </tbody>
      </table>
    </div>
  <?php
  } else {
  ?>
    <div class="alert alert-info" role="alert">
      <p><i class="mdi mdi-alert-circle"></i> No se encontraron Registros en la tabla solicitada.</p>
      <p><i class="fa fa-check"></i> Para comenzar a ingresar registros dar 'click' en el botón 'Nuevo' de la parte superior.</p>
    </div>
  <?php
  }
  ?>
</div>