<?php
$raiz = '../docs/';
$nav = '../';
$title = 'Usuarios';
// $id_sub_modulo='4';
include_once($raiz . 'class/head.php');
include_once($raiz . 'class/header.php');
include_once($raiz . 'class/nav.php');
//  include_once($raiz.'class/valida_permiso.php');
?>
<?php
include_once("modals.php");
?>
<!-- partial -->
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb breadcrumb-custom">
          <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>
          <li class="breadcrumb-item"><a href="#">Administrar Usuarios</a></li>
          <li class="breadcrumb-item active" aria-current="page"><span>Lista</span></li>
        </ol>
      </nav>
      <div class='col-xl-12'>
        <h3 class='text-right'>
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dataRegister"><i class='fa fa-plus'></i> Nuevo</button>
        </h3>
      </div>
      <div class="datos_ajax_register"></div>
      <div class="outer_div"></div>

    </div>
  </div>
  <!-- partial:partials/_footer.html -->

  <?php
  include_once($raiz . 'class/footer.php');
  ?>
  <script src="js/app.js"></script>
  <script>
    $(document).ready(function() {
      load(1);

    });
  </script>