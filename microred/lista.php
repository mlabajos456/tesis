<?php
$raiz = '../docs/';
include_once($raiz . 'class/head.php');
include_once($raiz . 'class/utilitario.php');
$formato = new utilitariophp();
$cons = "SELECT * from t_micro_red mr inner join t_red r on r.id_red = cod_red";
$val = $sql->numRegistros($cons);
?>
<!--notificaciones-->
<link rel="stylesheet" href="<?php echo $raiz; ?>assets/libs/css/style.css">
<!--check--->
<script src="<?php echo $raiz; ?>js/misc.js"></script>
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
          <tr class="bg-primary text-light">
            <th>Nombre Micro Red</th>
            <th>Nombre de Red</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $cont = 0;
          $linea = $sql->consulta($cons);
          while ($r = $sql->fetch_array($linea)) {

          ?>
            <tr>
              <td><?= $r['nom_mred'] ?></td>
              <td><?= $r['desc_red'] ?></td>
              <td>
                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#dataUpdate" data-cod_mred="<?php echo $r['cod_mred'] ?>" data-cod_red="<?php echo $r['cod_red'] ?>" data-nom_mred="<?php echo $r['nom_mred'] ?>">
                  <i class="fa fa-edit"></i>
                </button>
                <button type="button" class="btn btn-outline-danger" onclick="showSwal('swalEliminar','<?php echo $r['cod_mred'] ?>')">
                  <i class="fa fa-trash"></i>
                </button>
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
      <p>
      <p><i class="fa fa-check"></i> Para comenzar a ingresar registros dar 'click' en el botón 'Nuevo' de la parte superior.</p>
    </div>
  <?php
  }
  ?>
</div>