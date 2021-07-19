<?php

$raiz = "../../docs/";

require($raiz . "class/sentencias.php");
$sql = new sentencias();

$id_paciente = ($_POST['id_paciente']);
$fiebre = ($_POST['fiebre']);
echo 'estopy aqui';
echo $fiebre;
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
//$latitud = ($_POST['latitud']);
//$longitud = ($_POST['longitud']);
$prueba_rapida = ($_POST['prueba_rapida']);
$id_registrador = ($_POST['id_registrador']);
$id_tipo_prueba = ($_POST['id_tipo_prueba']);
$fecha_registro = ($_POST['fecha_registro']);

$sql->consulta("INSERT into t_covid (
    id_paciente,
    fiebre,
    tos,
    dolor_garganta,
    respiratorio,
    congestion_nasal,
    fecha_ini_sin,
    contacto_persona,
    out_country,
    id_country,
    work_ipress,
    obesidad,
    diabetes,
    inmunosupresor,
    gestante,
    asma,
    enfermedad_pulmonar_cro,
    hipertension,
    cancer,
    enfer_cardiovascular,
    renal_cro,
    adulto_mayor,
    niño,
    fam_enfer_cron,
    cant_pers,
    latitud,
    longitud,
    prueba_rapida,
    id_registrador,
    id_tipo_prueba,
    fecha_registro) 
    values(
    '$id_paciente',
    '$fiebre',
    '$tos',
    '$dolor_garganta',
    '$respiratorio',
    '$congestion_nasal',
    '$fecha_ini_sin',
    '$contacto_persona',
    '$out_country',
    '$id_country',
    '$work_ipress',
    '$obesidad',
    '$diabetes',
    '$inmunosupresor',
    '$gestante',
    '$asma',
    '$enfermedad_pulmonar_cro',
    '$hipertension',
    '$cancer',
    '$enfer_cardiovascular',
    '$renal_cro',
    '$adulto_mayor',
    '$niño',
    '$fam_enfer_cron',
    '$cant_pers',
    '-6.0435061',
    '-76.9723102',
    '$prueba_rapida',
    '$id_registrador',
    '$id_tipo_prueba',
    '$fecha_registro')");

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

/*

      $sql->consulta("INSERT into t_articulo (titulo,imagen,resumen,id_autor,link_youtube,enlace,fecha,estado,id_categoria) 

    values('$titulo','$img_articulo','$resumen','$id_autor','$link_youtube','$enlace','$fecha','$estado','$id_categoria')");



       if ($sql->error()){

      ?>

      <div class="alert alert-danger" role="alert">

            <button type="button" class="close" data-dismiss="alert">&times;</button>

            <strong>Error al insertar registro!</strong>

            

        </div>

        

      <?php

      }

      else{

      

       $linea=$sql->consulta("SELECT MAX(id_articulo) from t_articulo" );

       while($r = $sql->fetch_array($linea)){$respuesta=$r[0];}

       echo $respuesta;



      }

     */

?>