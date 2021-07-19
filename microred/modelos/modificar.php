<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$id_red = $_POST['id_red2'];
$cod_mred = $_POST['cod_mred2'];
$desc_mred = $_POST['desc_mred2'];


$sql->consulta("UPDATE t_micro_red set cod_red='$id_red', nom_mred='$desc_mred'
      where cod_mred='$cod_mred'");

if ($sql->error()) {
?>
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error al modificar registro!</strong>

  </div>

<?php
} else {

?>
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡el registro de modificó correctamente!</strong>

  </div>
<?php

}

?>