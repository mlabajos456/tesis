<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();

$dni = utf8_decode($_POST['dni']);
$apellido_paterno = utf8_decode($_POST['apellido_paterno']);
$apellido_materno = utf8_decode($_POST['apellido_materno']);
$nombre = utf8_decode($_POST['nombre']);
$fecha_nac = utf8_decode($_POST['fecha_nac']);
$estado_civil = utf8_decode($_POST['estado_civil']);
$sexo = utf8_decode($_POST['sexo']);
$domicilio = utf8_decode($_POST['domicilio']);
$telefono = utf8_decode($_POST['telefono']);
$val = $sql->numRegistros("SELECT e.dni from t_paciente e where e.dni='$dni'");

if ($val > 0) {

?>
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Paciente ya se encuentra registrado!</strong>

  </div>

  <?php
} else {
  $sql->consulta("INSERT into t_paciente (apellido_paterno,apellido_materno,nombre,fecha_nac,estado_civil,sexo,domicilio,telefono,dni) 
  values(
  '$apellido_paterno',
  '$apellido_materno',
  '$nombre',
  '$fecha_nac',
  '$estado_civil',
  '$sexo',
  '$domicilio',
  '$telefono',
  '$dni')");

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
<?php

}  ?>