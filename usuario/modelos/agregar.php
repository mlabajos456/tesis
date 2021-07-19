<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();

$id_persona = utf8_decode($_POST['id_persona']);
$usuario = utf8_decode($_POST['nom_usuario']);
$password = utf8_decode($_POST['pass_usuario']);


$val = $sql->numRegistros("SELECT e.usuario from t_registrador e where e.usuario='$usuario'");

if ($val > 0) {
  echo 1;
?>


  <?php
} else {
  $sql->consulta("INSERT into t_registrador (usuario,password,id_persona,estado_usuario,sa,img_user,c_barra) 
  values('$usuario','$password','$id_persona',1,0,'avatar2.JPG','navbar-dark')");

  if ($sql->error()) {
    echo 2;
  } else {

  ?>
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡el registro de insertó correctamente!</strong>

    </div>
<?php

  }
}
?>