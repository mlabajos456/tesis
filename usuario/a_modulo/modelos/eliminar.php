<?php
   $raiz = "../../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $id = utf8_decode($_POST['id']);
   

   
   $sql->consulta("DELETE from t_modulo_usuario where id_modulo_usuario='$id'");
   
       if (0>0){
      ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡el registro se encuentra enlazado!</strong>
            
        </div>
        
      <?php
      }
      else{
        //$sql->consulta("DELETE from t_usuario where id_usuario='$id'");
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡eliminación correcta!</strong>
            
        </div>
      <?php

      }
          
        ?>


        