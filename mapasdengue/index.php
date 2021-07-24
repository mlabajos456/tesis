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

          <li class="breadcrumb-item"><a href="#"><i class="fa fa-newspaper-o"></i> Mapa</a></li>

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
      <form id="detalle" name="detalle" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-6 form-group ">
            <input type="date" class="form-control border-primary" id="inicio" name="inicio">
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 form-group ">
            <input type="date" class="form-control border-primary" id="final" name="final">
          </div>
          <div class="col-md-3">
            <button type="button" onclick="renewMap();" style="height: 39px;" id="nuevo" name="nuevo" class="btn btn-outline-primary"><i class="fa fa-flag"></i> Rango de fechas</button>
          </div>

          <div class='col-md-3' align="text-right" float="right">
            <h3 class='text-right'>
              <a title="Reporte I1 y I2" href="../reportes/dengue_report.php" style="height:39px" target="_blank"><button type="button" id="nuevo" name="nuevo" class="btn btn-outline-primary"><i class="fa fa-flag"></i> Reporte I1 y I2</button></a>
            </h3>

          </div>
        </div>
      </form>



      <div class="datos_ajax_register leyenda">
          <h1>Total de casos: </h1>
      </div>

      <div class="outer_div" id='map2' style="height: 860px;
	width: 100%;">


      </div>

    </div>

  </div>



  <?php

  include_once($raiz . 'class/footer.php');

  ?>

  <script src="js/app.js"></script>

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap2&v=weekly"></script>


  <script>
     $(document).ready(function() {

    //  load(1);

    }); 
  </script>