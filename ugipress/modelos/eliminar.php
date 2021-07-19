<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$id = utf8_decode($_POST['id']);

$val = $sql->numRegistros("SELECT * from t_red a where a.cod_ugipress='$id'");


if ($val > 0) {
?>
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡el registro se encuentra enlazado!</strong>

  </div>

<?php
} else {
  $sql->consulta("DELETE from t_ugipress where cod_ugipress='$id'");
?>
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡eliminación correcta!</strong>

  </div>
<?php

}

?>