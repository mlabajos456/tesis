<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();


$id_covid = ($_POST['id_covid']);
$id_paciente = ($_POST['id_paciente']);
$fiebre = ($_POST['fiebre']);
$tos = ($_POST['tos']);
$dolor_garganta = ($_POST['dolor_garganta']);
$respiratorio = ($_POST['respiratorio']);
$congestion_nasal = ($_POST['congestion_nasal']);
$fecha_ini_sin = ($_POST['fecha_ini_sin']);
$contacto_persona = ($_POST['contacto_persona']);
$out_country = ($_POST['out_country']);
$id_country = ($_POST['id_country']);
$work_ipress = ($_POST['work_ipress']);
$obesidad = ($_POST['obesidad']);
$diabetes = ($_POST['diabetes']);
$inmunosupresor = ($_POST['inmunosupresor']);
$gestante = ($_POST['gestante']);
$asma = ($_POST['asma']);
$enfermedad_pulmonar_cro = ($_POST['enfermedad_pulmonar_cro']);
$hipertension = ($_POST['hipertension']);
$cancer = ($_POST['cancer']);
$enfer_cardiovascular = ($_POST['enfer_cardiovascular']);
$renal_cro = ($_POST['renal_cro']);
$adulto_mayor = ($_POST['adulto_mayor']);
$niño = ($_POST['niño']);
$fam_enfer_cron = ($_POST['fam_enfer_cron']);
$cant_pers = ($_POST['cant_pers']);
$latitud = ($_POST['latitud']);
$longitud = ($_POST['longitud']);
$prueba_rapida = ($_POST['prueba_rapida']);
$id_registrador = ($_POST['id_registrador']);
$id_tipo_prueba = ($_POST['id_tipo_prueba']);
$fecha_registro = ($_POST['fecha_registro']);

$sql->consulta("UPDATE t_covid SET
    id_paciente = '$id_paciente',
    fiebre = '$fiebre',
    tos = '$tos',
    dolor_garganta = '$dolor_garganta',
    respiratorio = '$respiratorio',
    congestion_nasal = '$congestion_nasal',
    fecha_ini_sin = '$fecha_ini_sin',
    contacto_persona = '$contacto_persona',
    out_country = '$out_country',
    id_country = '$id_country',
    work_ipress = '$work_ipress',
    obesidad = '$obesidad',
    diabetes = '$diabetes',
    inmunosupresor = '$inmunosupresor',
    gestante = '$gestante',
    asma = '$asma',
    enfermedad_pulmonar_cro = $enfermedad_pulmonar_cro,
    hipertension = '$hipertension',
    cancer = '$cancer',
    enfer_cardiovascular = '$enfer_cardiovascular',
    renal_cro = '$renal_cro',
    adulto_mayor = '$adulto_mayor',
    niño = '$niño',
    fam_enfer_cron ='$fam_enfer_cron',
    cant_pers = '$cant_pers',
    latitud = '$latitud',
    longitud = '$longitud',
    prueba_rapida = '$prueba_rapida',
    id_registrador = $id_registrador,
    id_tipo_prueba = '$id_tipo_prueba',
    fecha_registro = '$fecha_registro'

    
    where id_covid = '$id_covid'");
if ($sql->error()) {
    $respuesta = array($sql->error());
    echo json_encode($respuesta);
} else {
    $respuesta = array('okay');
    echo json_encode($respuesta);
}
