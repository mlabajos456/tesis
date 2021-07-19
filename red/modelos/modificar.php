<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$descripcion = ($_POST['desc_red2']);
$codigo_ugipress = ($_POST['cod_ugipress2']);
$id_red = ($_POST['id_red2']);


$sql->consulta("UPDATE t_red set desc_red='$descripcion', cod_ugipress='$codigo_ugipress'
      where id_red='$id_red'");

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