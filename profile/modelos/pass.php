<?php
   session_start();
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();

   $pass= $_POST['n_pass'];
   $id_usuario= $_POST['id'];


   $sql->consulta("UPDATE usuarios set pass_usuario='$pass' where id_usuario='$id_usuario'");
 


?>