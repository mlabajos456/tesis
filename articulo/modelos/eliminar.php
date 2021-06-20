<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $id = ($_POST['id']);
   

   $sql->consulta("DELETE from t_articulo where id_articulo='$id'");
   
   //$sql->consulta("DELETE from t_dato_laboral where id_dato_laboral='$id'");
   if ($sql->error()){
      ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡el registro no se pudo eliminar!</strong>
            
        </div>
        
      <?php
      }
      else{
       
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡eliminación correcta!</strong>
            
        </div>
      <?php

      }
          
        ?>


        