<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$id_registrador = utf8_decode($_POST['id_registrador']);
$id_persona = utf8_decode($_POST['id_persona']);
$usuario = utf8_decode($_POST['usuario']);
$password = utf8_decode($_POST['password']);



$sql->consulta("UPDATE t_usuario set nom_usuario='$nom_usuario', nom_empleado='$nom_empleado' where id_usuario='$id_usuario'");

if ($sql->error()) {
?>
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error al insertar registro!</strong>

  </div>

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