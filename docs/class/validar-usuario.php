<?php

session_start();

require_once("sentencias.php");

$sql = new sentencias();



$replace = array("%", "$", "'", '"', " ");



$nick = htmlentities(trim($_POST['nick']));

$nick = str_replace($replace, "", $nick);



$pass = htmlentities(trim($_POST['pass']));

$pass = str_replace($replace, "", $pass);

$m_actual = date("m");

$a_actual = date("Y");





//	$result = $sql->fetch_array($sql->consulta("SELECT usuario, password, id_usuario,c_barra,nombre,apellidos,img_user FROM t_usuario WHERE usuario = '$nick' AND estado_usuario ='1' AND password = '$pass'"));


$result = $sql->fetch_array($sql->consulta("SELECT usuario, password, id_registrador ,c_barra, t.nombre as nombre, 
	t.apellido_paterno as apellidos,img_user, t.apellido_materno as materno FROM t_registrador r
	inner join t_paciente t on t.id_persona = r.id_persona
	WHERE usuario = '$nick' AND estado_usuario ='1' AND password = '$pass' "));




if ($result[0] == $nick && ($result[1]) == $pass) {

	$_SESSION['nickname'] = $result[0];

	$_SESSION['id'] = $result[2];

	$_SESSION['c_barra'] = $result[3];

	$_SESSION['nombre'] = $result['nombre'];

	$_SESSION['apellidos'] = $result['nombre'] . ' ' . $result['apellidos'];

	$_SESSION['nav'] = "sidebar-dark"; //sidebar-icon-only

	$_SESSION['img_user'] = $result[6];

	//$rsp=  $sql->fetch_array($sql->consulta("SELECT * FROM t_periodo WHERE ano_periodo = '$a_actual' AND mes_periodo ='$m_actual'"));

	header("Location: ../../index");

	//$_SESSION['id_periodo'] = $rsp[0];     



} else {

	header("Location:../../login?result=error");
}
?>
<script>
</script>