<?php
	session_start();

	//require("docs/class/sentencias.php");
  	//$sql = new sentencias();

	//$sql->consulta("UPDATE t_usuario SET estado_linea = 0 WHERE id_usuario = ".$_SESSION['id']."");
   // echo $_SESSION['id'];
	session_destroy();

	header("Location: login.php");
?>