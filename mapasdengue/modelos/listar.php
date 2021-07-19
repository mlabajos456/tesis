<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();

$cons = ("SELECT latitud, longitud
from t_covid c ");
$resultado = array();
$linea = $sql->consulta($cons);
foreach ($linea as $datos) :
    $resultado[] = $datos;
endforeach;
echo json_encode($resultado);
