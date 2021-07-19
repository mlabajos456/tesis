<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$idCovid = $_POST['idCovid'];

  $sql->consulta("DELETE from t_covid where id_covid='$id'");
  if ($sql->error()) {
    $respuesta = $sql->error();
    echo json_encode($respuesta);
} else {
    $respuesta = 'okay';
    echo json_encode($respuesta);
}
