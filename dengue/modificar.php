<?php

$raiz = '../docs/';

$nav = '../';

$title = 'Editar triaje de caso de covid ';

include($raiz . 'class/head.php');

include($raiz . 'class/header.php');

include_once($raiz . 'class/nav.php');

include_once($raiz . 'class/utilitario.php');


$id_dengue = $_GET['id_dengue'];
$formato = new utilitariophp();

$cons = "SELECT c.id_dengue, c.id_paciente, c.id_registrador, c.longitud, c.latitud, c.had_dengue, c.temperatura, c.mialgias, c.cefalea, c.ocular_retro_ache,
c.lumbar_ache, c.rash, c.conjuntivitis, c.nauseas, c.abdominal_ache, c.toracico_ache, c.derrame_seroso, c.vomitos_perm, c.hipotermia, c.diuresis,c.hepatomegalia,
c.ictericia, c.estado_mental, c.hematocrito, c.pulso_debil, c.cianoticas, c.presion_arterial, r.usuario, p.nombre, p.apellido_paterno, p.apellido_materno, p.dni,
c.fecha_registro, reg.nombre as regnombre, reg.apellido_paterno as regpaterno, reg.apellido_materno as regmaterno
from t_dengue c
LEFT join t_paciente p on p.id_persona = c.id_paciente
INNER join t_registrador r on c.id_registrador = r.id_registrador
LEFT join t_paciente reg on reg.id_persona = r.id_persona where id_dengue=$id_dengue "

?>






<div class="content-wrapper">

  <div class="card">

    <div class="card-body">

      <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">

        <nav aria-label="breadcrumb" role="navigation">

          <ol class="breadcrumb breadcrumb-custom">

            <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>

            <li class="breadcrumb-item"><a href="index.php"> Formulario</a></li>

            <li class="breadcrumb-item active" aria-current="page"><span> Editar Registro</span> </li>

          </ol>

        </nav>

        <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">

          <li class="nav-item">

            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="I" aria-expanded="true">1. Signos y Sintomas</a>

          </li>

        </ul>



      </div>











      <h4 class="card-title">Formulario de Triage Casos Covid</h4>

      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">

          <form id="detalle" name="detalle" enctype="multipart/form-data">

            <input type="hidden" id='id_covid' value='<?= $id_covid ?>'>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group ">

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                  <h3>Sintomas</h3>
                </div>
                <!--  ESTABLECIMIENTO/PACIENTE -->

                <?php
                $info = $sql->consulta($cons);
                foreach ($info as $c) :


                ?>




                  <div class=" col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class=" form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" id='fiebre' <?= $c['fiebre'] == 1 ? "checked=''" : '' ?> class="form-check-input">
                        1.- ¿Presenta fiebre ?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" id='tos' <?= $c['tos'] == 1 ? "checked=''" : '' ?> class="form-check-input">
                        2.- ¿Presenta Tos?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" id='congestion_nasal' <?= $c['congestion_nasal'] == 1 ? "checked=''" : '' ?> class="form-check-input">
                        3.- ¿Presenta rinorrea/congestion nasal?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" id='respiratorio' <?= $c['respiratorio'] == 1 ? "checked=''" : '' ?> class="form-check-input">
                        4.- ¿Presenta Sibilancias?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='dolor_garganta' <?= $c['dolor_garganta'] == 1 ? "checked=''" : '' ?>>
                        5.- ¿Presenta dolor torácico?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='contacto_persona' <?= $c['contacto_persona'] == 1 ? "checked=''" : '' ?>>
                        6.- ¿Presenta Mialgias?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='out_country' <?= $c['out_country'] == 1 ? "checked=''" : '' ?>>
                        7.- ¿Presenta Artralgias?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='work_ipress' <?= $c['work_ipress'] == 1 ? "checked=''" : '' ?>>
                        8.- ¿Presenta cansancio/malestar?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='obesidad' <?= $c['obesidad'] == 1 ? "checked=''" : '' ?>>
                        9.- ¿Presenta deambulación?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='diabetes' <?= $c['diabetes'] == 1 ? "checked=''" : '' ?>>
                        10.- ¿Tiraje costal muy acentuado?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='inmunosupresor' <?= $c['inmunosupresor'] == 1 ? "checked=''" : '' ?>>
                        11.- ¿Presenta Cefaleas?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='gestante' <?= $c['gestante'] == 1 ? "checked=''" : '' ?>>
                        12.- ¿Presenta alteración de la conciencia/confusión?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='asma' <?= $c['asma'] == 1 ? "checked=''" : '' ?>>
                        13.- ¿Presenta convulsiones?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='enfermedad_pulmonar_cro' <?= $c['enfermedad_pulmonar_cro'] == 1 ? "checked=''" : '' ?>>
                        14.- ¿Presenta dolor abdominal?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='hipertension' <?= $c['hipertension'] == 1 ? "checked=''" : '' ?>>
                        15.- ¿Presenta vomitos/nauseas?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='cancer' <?= $c['cancer'] == 1 ? "checked=''" : '' ?>>
                        16.- ¿Presenta diarrea?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='enfer_cardiovascular' <?= $c['enfer_cardiovascular'] == 1 ? "checked=''" : '' ?>>
                        17.- ¿Presenta Conjuntivitis?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='renal_cro' <?= $c['renal_cro'] == 1 ? "checked=''" : '' ?>>
                        18.- ¿Presenta erupciones cutaneas?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='adulto_mayor' <?= $c['adulto_mayor'] == 1 ? "checked=''" : '' ?>>
                        19.- ¿Presenta ulceras cutáneas?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id='prueba_rapida' <?= $c['prueba_rapida'] == 1 ? "checked=''" : '' ?>>
                        20.- ¿Resultado de Prueba Rápida?
                        <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-md-1 col-sm-12 col-xs-12 form-group ">

                    <label>Oxigenación</label>

                    <input type="text" class="form-control border-primary " id="cant_pers" value='<?= $c['cant_pers'] ?>' aria-describedby="colored-addon1">

                  </div>
              </div>

            <?php
                endforeach
            ?>
            <div class="form-group mt-12" align="right">

              <button type="submit" class="btn btn-success mr-2" id="guardar"><i class="fa fa-save"></i> Guardar</button>

              <button onclick="salir()" class="btn btn-outline-danger">Volver</button>

            </div>

            </div>

        </div>


        </form>
      </div>

    </div>

  </div>



  <?php

  include_once($raiz . 'class/footer.php');

  ?>

  <script src="js/app.js"></script>

  <script type="text/javascript">
    function salir() {

      window.location = 'index.php';

    }
  </script>

  <script type="text/javascript">









  </script>