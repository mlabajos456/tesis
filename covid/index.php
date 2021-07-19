<?php

$raiz = '../docs/';

$nav = '../';

$title = 'Sepelios';

include_once($raiz . 'class/head.php');

include_once($raiz . 'class/header.php');

include_once($raiz . 'class/nav.php');





//$id_sub_modulo='25';

//include_once($raiz.'class/valida_permiso.php');



?>



<div class="content-wrapper">

  <div class="card">

    <div class="card-body">

      <nav aria-label="breadcrumb" role="navigation">

        <ol class="breadcrumb breadcrumb-custom">

          <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>

          <li class="breadcrumb-item"><a href="#"><i class="fa fa-newspaper-o"></i> Formulario Triaje Covid</a></li>

          <li class="breadcrumb-item active" aria-current="page"><span></span></li>

        </ol>

      </nav>

      <!-- <div class='col-xl-12'>

                    <div class="row">

                      <label>Desde</label>

                      <div class="col-md-2 col-sm-12 col-xs-12 form-group "> 

                              

                        <div id="datepicker-popup" class="input-group date datepicker">

                          <input type="text" class="form-control">

                          <div class="input-group-addon input-group-text">

                            <span class="mdi mdi-calendar"></span>

                          </div>

                        </div>                        

                      </div>                      

                    </div>

                  </div>

                   -->

      <div class='col-xl-12' align="text-right">

        <h3 class='text-right'>



          <a title="Nuevo registro" href="insertar.php"><button type="button" id="nuevo" name="nuevo" class="btn btn-outline-primary"><i class="fa fa-plus-circle"></i> Nuevo</button></a>

        </h3>

      </div>



      <div class="datos_ajax_register"></div>

      <div class="outer_div"></div>

    </div>

  </div>



  <?php

  include_once($raiz . 'class/footer.php');

  ?>

  <script src="js/app.js"></script>



  <script>
    $(document).ready(function() {

      load(1);

    });
  </script>