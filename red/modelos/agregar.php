<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$descripcion = ($_POST['desc_red']);
$codigo_ugipress = ($_POST['cod_ugipress']);
$cod_red = ($_POST['cod_red']);


$sql->consulta("INSERT into t_red (id_red,desc_red,cod_ugipress) values($cod_red,'$descripcion', '$codigo_ugipress')");

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