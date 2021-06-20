<?php
   $raiz = "../../docs/";
   require($raiz."class/head.php");

   $val = utf8_decode($_POST['val']);
   $id = utf8_decode($_POST['id']);

   $switch=($val==1)? '0':'1';

   $sql->consulta("UPDATE t_usuario set estado_usuario='$switch' where id_usuario='$id'");

    if (isset($errors)){
      ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error al cargar Datos!</strong>
            
        </div>
        
      <?php
      }
      else{
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Cambio Correcto!</strong>
            
        </div>
      <?php

      }
          
        ?>
