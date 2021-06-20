<?php
session_start();
   $raiz = "../docs/";
   require($raiz."class/sentencias.php");
   
   $sql = new sentencias();
   $op = utf8_decode($_POST['op']);
   switch ($op) {
     case '1':
       $actual=$_SESSION['nav'];
       $_SESSION['nav']=($actual=='')?'sidebar-icon-only':'';
       echo "colapso";
       break;

     case '2':
          $color = utf8_decode($_POST['color']);
           $id=$_SESSION['id'];
           $sql->consulta("UPDATE t_usuario set c_barra='$color' where id_usuario='$id'");
           $_SESSION['c_barra']=$color;
            if (isset($errors)){
              echo "error";
              }
              else{
                echo "color modificado";
              }
       break;       
     
     default:
       echo 'error';
       break;
   }

          
        ?>