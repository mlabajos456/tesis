<?php
$raiz = '../docs/';
include_once($raiz . 'class/head.php');
$cons = "SELECT r.id_registrador, r.estado_usuario, usuario, p.nombre, p.apellido_paterno, p.apellido_materno, p.dni, r.sa, r.password, p.id_persona FROM t_registrador r 
  inner join t_paciente p on p.id_persona = r.id_persona  ORDER BY id_registrador ASC";
?>
<!--notificaciones-->
<link rel="stylesheet" href="<?php echo $raiz; ?>assets/libs/css/style.css">
<!--paginado-->
<script src="<?php echo $raiz; ?>vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?php echo $raiz; ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?php echo $raiz; ?>js/data-table.js"></script>
<!--fin paginado-->
<div class="col-12">
  <div class="table-responsive">
    <table id="order-listing" class="table">
      <thead>
        <tr class="bg-primary text-light">
          <th>Usuario</th>
          <th>Nombres y Apellidos</th>
          <th>DNI</th>

          <th>Tipo de Usuario</th>
          <th>Permisos de Usuario</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $cont = 0;
        $linea = $sql->consulta($cons);
        while ($r = $sql->fetch_array($linea)) {
          $estado = ($r['estado_usuario'] == 1) ? 'checked=""' : '';
          $admin = $r['sa'] == 1 ? 'Administrador' : 'Personal Registrador';
          $cont++;
        ?>
          <tr>
            <td><?= $r['usuario'] ?></td>
            <td><?= ($r['nombre'] . ' ' . $r['nombre'] . ' ' . $r['apellido_paterno'] . ' ' . $r['apellido_materno']) ?></td>
            <td><?= ($r['dni']) ?></td>
            <td><?= ($admin) ?></td>


            <td>
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Asignar
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                  <a class="dropdown-item" onclick="sa(1,<?= $r['id_registrador'] ?>)">Administrador</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" onclick="sa(0,<?= $r['id_registrador'] ?>)">Personal Registrador</a>
                </div>
              </div>
            </td>
            <td>
              <div class="col-12 col-sm-8 col-lg-6 pt-1">
                <div class="switch-button switch-button-success">
                  <input type="checkbox" <?= $estado ?> name="switch1<?= $cont ?>" id="switch1<?= $cont ?>" onclick="sw(<?= $r['estado_usuario'] ?>,<?= $r['id_registrador'] ?>);"><span>

                    <label for="switch1<?= $cont ?>"></label></span>



                </div>
              </div>
            </td>
            <td>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#dataUpdate" data-idregistrador="<?php echo $r['id_registrador'] ?>" data-password="<?php echo ($r['password']) ?>" data-usuario="<?= $r['usuario'] ?>" data-idpersona="<?= $r['id_persona'] ?>"> <i class=" fa fa-edit"></i>
              </button>
              <button type="button" class="btn btn-danger" onclick="showSwal('swalEliminar','<?php echo $r[0] ?>')">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  //controlador SWITCH para EDITAR ESTADO   
  function sw(val, id) {
    $.ajax({
      type: "POST",
      url: "modelos/switch.php",
      data: 'val=' + val + '&id=' + id,
      beforeSend: function(objeto) {

      },
      success: function(datos) {
        showToastPosition('bottom-right', 'Proceso correcto!', 'Los datos se modificaron con éxito', 'success');
        load(1);

      }
    });
  }

  function sa(val, id) {
    $.ajax({
      type: "POST",
      url: "modelos/permisos.php",
      data: 'val=' + val + '&id=' + id,
      beforeSend: function(objeto) {},
      success: function(datos) {
        showToastPosition('bottom-right', 'Proceso correcto!', 'Los datos se modificaron con éxito', 'success');
        load(1);

      }
    });
  }
</script>