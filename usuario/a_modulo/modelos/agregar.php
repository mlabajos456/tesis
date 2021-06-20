<?php
   $raiz = "../../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $id_usuario = utf8_decode($_POST['id_usuario']);
   $id_modulo = utf8_decode($_POST['id_modulo']);
   
   $val=$sql->numRegistros("SELECT * FROM t_modulo_usuario where id_usuario='$id_usuario' and id_modulo='$id_modulo'");

   if ($val>0) {
     ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="warning">&times;</button>
            <strong>el módulo ya está registrado!</strong>
            
        </div>
        
      <?php
   }else{
      $sql->consulta("INSERT into t_modulo_usuario (id_usuario,id_modulo) values('$id_usuario','$id_modulo')");
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡el registro de insertó correctamente!</strong>
            
        </div>
      <?php

      }
          
        ?>






     
