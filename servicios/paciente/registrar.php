<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();

$dni = ($_POST['dni']);
$apellido_paterno = ($_POST['apellido_paterno']);
$apellido_materno = ($_POST['apellido_materno']);
$nombre = ($_POST['nombre']);
$fecha_nac = ($_POST['fecha_nac']);
$estado_civil = ($_POST['estado_civil']);
$sexo = ($_POST['sexo']);
$domicilio = ($_POST['domicilio']);
$telefono = ($_POST['telefono']);

$val = $sql->numRegistros("SELECT e.dni from t_paciente e where e.dni='$dni'");
$respuesta = array();
if ($val > 0) {
    $respuesta = array('duplicidad');
    echo json_encode($respuesta);
} else {
    $sql->consulta("INSERT into t_paciente (apellido_paterno,apellido_materno,nombre,fecha_nac,estado_civil,sexo,domicilio,telefono,dni,id_est_salud) 
    values(
    '$apellido_paterno',
    '$apellido_materno',
    '$nombre',
    '$fecha_nac',
    '$estado_civil',
    '$sexo',
    '$domicilio',
    '$telefono',
    '$dni',
    '999')");
    if ($sql->error()) {
        $respuesta = array('error');
        echo json_encode($respuesta);
    } else {
        $respuesta = array('okay');
        echo json_encode($respuesta);
    }
}
