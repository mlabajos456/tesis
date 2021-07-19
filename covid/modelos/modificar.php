<?php

session_start();

$raiz = "../../docs/";

require($raiz . "class/sentencias.php");

$sql = new sentencias();

$id_covid = ($_POST['id_covid']);
$fiebre = ($_POST['fiebre']);
$tos = ($_POST['tos']);
$dolor_garganta = ($_POST['dolor_garganta']);
$respiratorio = ($_POST['respiratorio']);
$congestion_nasal = ($_POST['congestion_nasal']);
$contacto_persona = ($_POST['contacto_persona']);
$out_country = ($_POST['out_country']);
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
$nino = ($_POST['nino']);
$fam_enfer_cron = ($_POST['fam_enfer_cron']);
$cant_pers = ($_POST['cant_pers']);
$prueba_rapida = ($_POST['prueba_rapida']);

$sql->consulta("UPDATE t_covid SET
    fiebre = '$fiebre',
    tos = '$tos',
    dolor_garganta = '$dolor_garganta',
    respiratorio = '$respiratorio',
    congestion_nasal = '$congestion_nasal',
    contacto_persona = '$contacto_persona',
    out_country = '$out_country',
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
    nino = '$nino',
    fam_enfer_cron ='$fam_enfer_cron',
    cant_pers = '$cant_pers',
    prueba_rapida = '$prueba_rapida' 
    where id_covid = '$id_covid'");

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