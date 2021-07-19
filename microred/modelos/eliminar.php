<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$id = utf8_decode($_POST['id']);

$val = $sql->numRegistros("SELECT * from t_establecimiento_salud a where a.cod_mred='$id'");


if ($val > 0) {
  echo 1;
?>


<?php
} else {
  $sql->consulta("DELETE from t_micro_red where cod_mred='$id'");
?>
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡eliminación correcta!</strong>

  </div>
<?php

}

?>