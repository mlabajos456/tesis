<?php
   session_start();
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();

   $avatar= $_GET['avatar'];
   $id_usuario= $_GET['id'];


   $sql->consulta("UPDATE usuarios set img_user='$avatar' where id_usuario='$id_usuario'");
   $_SESSION['img_user']= $avatar;


?>