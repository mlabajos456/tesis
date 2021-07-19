<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$descripcion = $_POST['descripcion'];
$cod_ref = $_POST['cod_ref'];


$sql->consulta("INSERT into t_ugipress (descripcion,cod_ref) values('$descripcion', '$cod_ref')");

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