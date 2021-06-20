<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();

$id_dengue = ($_POST['id_dengue']);
$id_paciente = ($_POST['id_paciente']);
$had_dengue = ($_POST['had_dengue']);
$temperatura = ($_POST['temperatura']);
$mialgias = ($_POST['mialgias']);
$cefalea = ($_POST['cefalea']);
$ocular_retro_ache = ($_POST['ocular_retro_ache']);
$lumbar_ache = ($_POST['lumbar_ache']);
$rash = ($_POST['rash']);
$conjuntivitis = ($_POST['conjuntivitis']);
$nauseas = ($_POST['nauseas']);
$abdominal_ache = ($_POST['abdominal_ache']);
$toracico_ache = ($_POST['toracico_ache']);
$derrame_seroso = ($_POST['derrame_seroso']);
$vomitos_perm = ($_POST['vomitos_perm']);
$hipotermia = ($_POST['hipotermia']);
$diuresis = ($_POST['diuresis']);
$hepatomegalia = ($_POST['hepatomegalia']);
$ictericia = ($_POST['ictericia']);
$estado_mental = ($_POST['estado_mental']);
$hematocrito = ($_POST['hematocrito']);
$pulso_debil = ($_POST['pulso_debil']);
$cianoticas = ($_POST['cianoticas']);
$presion_arterial = ($_POST['presion_arterial']);
$latitud = ($_POST['latitud']);
$longitud = ($_POST['longitud']);
$id_registrador = ($_POST['id_registrador']);
$fecha_registro = ($_POST['fecha_registro']);

$sql->consulta("UPDATE t_dengue SET
id_paciente = '$id_paciente',
    had_dengue = '$had_dengue',
    temperatura = '$temperatura',
    mialgias = '$mialgias',
    cefalea = '$cefalea',
    ocular_retro_ache = '$ocular_retro_ache',
    lumbar_ache = '$lumbar_ache',
    rash = '$rash',
    conjuntivitis = '$conjuntivitis',
    nauseas = '$nauseas',
    abdominal_ache = '$abdominal_ache',
    toracico_ache = '$toracico_ache',
    derrame_seroso = '$derrame_seroso',
    vomitos_perm = '$vomitos_perm',
    hipotermia = '$hipotermia',
    diuresis = '$diuresis',
    hepatomegalia = $hepatomegalia,
    ictericia = '$ictericia',
    estado_mental = '$estado_mental',
    hematocrito = '$hematocrito',
    pulso_debil = '$pulso_debil',
    cianoticas = '$cianoticas',
    presion_arterial = '$presion_arterial',
    latitud = '$latitud',
    longitud = '$longitud',
    id_registrador = $id_registrador,
    fecha_registro = '$fecha_registro'    
    where id_dengue = '$id_dengue'");
if ($sql->error()) {
    $respuesta = array($sql->error());
    echo json_encode($respuesta);
} else {
    $respuesta = array('okay');
    echo json_encode($respuesta);
}
