<?php
$raiz = '../docs/';
$nav = '../';
$title = 'Categoria';
include_once($raiz . 'class/head.php');
include_once($raiz . 'class/header.php');
include_once($raiz . 'class/nav.php');
?>
<?php
include_once("modals.php");
?>
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Red</h4>
      <div class='col-xl-12'>
        <h3 class='text-right'>
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dataRegister"><i class='fa fa-plus'></i> Nuevo</button>
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