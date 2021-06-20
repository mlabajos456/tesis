<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();

$cons = ("SELECT * from t_establecimiento_salud");

$resultado = array();
$linea = $sql->consulta($cons);

foreach ($linea as $datos) :
    $resultado[] = $datos;
endforeach;
echo json_encode($resultado);
