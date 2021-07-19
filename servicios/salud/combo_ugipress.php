<?php



$raiz = "../../docs/";

require_once("$raiz/class/sentencias.php");

$sql = new sentencias();

$id_red = $_POST['id_red'];

$id_red = intval($_REQUEST['id_red']);

$resultado = array();
$linea1 = $sql->consulta("SELECT id_red, desc_red, cod_ugipress from t_red where id_red = '$id_red'");
foreach ($linea1 as $datos) :
  $resultado[] = $datos;
endforeach;

echo intval($resultado[0]['cod_ugipress']);
