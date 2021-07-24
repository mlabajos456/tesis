<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();
$inicio = $_POST['inicio'];
$final = $_POST['final'];
    $cons = ("SELECT longitud, latitud, fecha_registro from t_covid where fecha_registro BETWEEN '$inicio' and '$final' ");
$resultado = array();
$linea = $sql->consulta($cons);
foreach ($linea as $datos) :
    $resultado[] = $datos;
endforeach;
echo json_encode($resultado);
