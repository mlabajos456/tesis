<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();


$usuario = ($_POST['usuario']);
$password = ($_POST['password']);

$result = $sql->consulta("SELECT * FROM t_registrador r
	inner join t_paciente t on t.id_persona = r.id_persona
	WHERE r.usuario = '$usuario' AND r.estado_usuario ='1' AND password = '$password' ");

$resultado;


$resultado[] = $result;
if (empty($resultado)) {
    $resultado = ('incorrecto');
    echo json_encode($resultado);
} else {
    echo json_encode($resultado);
}
