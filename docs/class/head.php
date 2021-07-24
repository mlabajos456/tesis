<?php
  session_start();
  
  date_default_timezone_set("America/Lima");
  require_once($raiz."class/sentencias.php");

  $sql = new sentencias();

  if(!isset($_SESSION['nickname'])){
    header("Location:".$raiz."../login.php");
    
 }
 
  $usuario = $sql->fetch_array($sql->consulta("SELECT * from t_registrador inner join t_paciente  WHERE usuario = '".$_SESSION['nickname']."'"));
  //$usuario = pg_fetch_array($sql->consulta("SELECT * from t_usuario WHERE nom_usuario = '".$_SESSION['nickname']."'"));
?>
<!DOCTYPE html>
<html lang="en">


<!-- Thu, 25 Jul 2019 06:12:20 GMT -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Triaje | <?= $title ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/css/vendor.bundle.base.css">

  <!-- endinject -->
    <!-- plugin css for datatable page -->
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
   <!-- endinject -->
   <!-- plugin css for notifications page -->
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-toast-plugin/jquery.toast.min.css">
   <!-- endinject -->
   <!-- plugin css for popus page -->
  <link rel="stylesheet" type="text/css" href="<?php echo $raiz;?>vendors/sweetalert2/sweetalert2.min.css">
  <!-- endinject -->
    <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/icheck/skins/all.css" />
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/select2/select2.min.css" />
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
  <!-- End plugin css for this page -->

     <!-- plugin css for editor page -->
   <link rel="stylesheet" href="<?php echo $raiz;?>vendors/summernote/dist/summernote-bs4.css">
   <link rel="stylesheet" href="<?php echo $raiz;?>vendors/quill/quill.snow.css">
   <link rel="stylesheet" href="<?php echo $raiz;?>vendors/simplemde/simplemde.min.css">
    <!-- End plugin css for this page -->

    <!-- plugin css for upload page -->
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-tags-input/jquery.tagsinput.min.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/fontawesome-stars.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/bars-1to10.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/bars-horizontal.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/bars-movie.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/bars-pill.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/bars-reversed.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/bars-square.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/bootstrap-stars.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/css-stars.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/dropify/dropify.min.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-file-upload/uploadfile.css">
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/clockpicker/jquery-clockpicker.min.css" />
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-asColorPicker/css/asColorPicker.min.css" />
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/x-editable/bootstrap-editable.css">
  <!-- End plugin css for upload page -->
  <!--/********************************************************************************************************-->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page dropify  3.3.1-->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $raiz;?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $raiz;?>images/icono.png" />
  <!--<script src="<?php echo $raiz;?>js/js.js"></script>-->


</head>