<?php 
	session_start();
	if(isset($_SESSION['nickname'] ))
	{ 
		die ("<script>  window.location='".$raiz."../index.php';</script>");
	}
?>