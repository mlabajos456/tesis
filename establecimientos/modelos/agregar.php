<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$id_red = $_POST['id_red'];
$cod_mred = $_POST['cod_mred'];
$desc_mred = $_POST['desc_mred'];

$sql->consulta("INSERT into t_micro_red (cod_red, cod_mred,nom_mred ) values('$id_red','$cod_mred', '$desc_mred')");

if ($sql->error()) {
  echo 1;
?>

<?php
} else {

?>
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡el registro de insertó correctamente!</strong>

  </div>
<?php

}

?>