<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();

$val = $sql->numRegistros("SELECT e.dni from t_paciente e where e.dni='$dni'");
$id_persona = $_POST['id_persona'];
$dni = utf8_decode($_POST['dni']);
$apellido_paterno = utf8_decode($_POST['apellido_paterno']);
$apellido_materno = utf8_decode($_POST['apellido_materno']);
$nombre = utf8_decode($_POST['nombre']);
$fecha_nac = utf8_decode($_POST['fecha_nac']);
$estado_civil = utf8_decode($_POST['estado_civil']);
$sexo = utf8_decode($_POST['sexo']);
$domicilio = utf8_decode($_POST['domicilio']);
$telefono = utf8_decode($_POST['telefono']);
$respuesta = array();
$sql->consulta("UPDATE t_paciente 
    set 
   apellido_paterno ='$apellido_paterno',
   apellido_materno = '$apellido_materno',
   nombre ='$nombre',
   fecha_nac = '$fecha_nac',
   estado_civil = '$estado_civil',
   sexo = '$sexo',
   domicilio = '$domicilio',
   telefono = '$telefono',
   dni = '$dni'
   where id_persona='$id_persona'");
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