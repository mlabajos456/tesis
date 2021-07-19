<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$descripcion = ($_POST['descripcion2']);
$codigo_ugipress = ($_POST['codigo_ugipress2']);
$cod_ref = ($_POST['cod_ref2']);


$sql->consulta("UPDATE t_ugipress set descripcion='$descripcion',cod_ref='$cod_ref'
      where cod_ugipress='$codigo_ugipress'");

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