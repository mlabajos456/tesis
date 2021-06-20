<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $id_categoria = ($_POST['id_categoria']);
   $descripcion = ($_POST['descripcion']);


   $sql->consulta("UPDATE t_categoria set descripcion='$descripcion'
      where id_categoria='$id_categoria'");

       if ($sql->error()){
      ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error al modificar registro!</strong>
            
        </div>
        
      <?php
      }
      else{
      
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡el registro de modificó correctamente!</strong>
            
        </div>
      <?php

      }
          
        ?>


        