<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();

$cons = ("SELECT c.id_covid, c.id_paciente, c.id_registrador, c.id_tipo_prueba, c.prueba_rapida,c.longitud, c.latitud, r.usuario, p.nombre, p.apellido_paterno, p.apellido_materno, p.dni, tp.descripcion, c.fecha_registro
from t_dengue c
INNER JOIN t_paciente p on p.id_persona = c.id_paciente
INNER join t_registrador r on c.id_registrador = r.id_registrador
INNER join t_tipo_prueba tp on tp.id_tipo_prueba = c.id_tipo_prueba");
$resultado = array();
$linea = $sql->consulta($cons);
foreach ($linea as $datos) :
    $resultado[] = $datos;
endforeach;
echo json_encode($resultado);
