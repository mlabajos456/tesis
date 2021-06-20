<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();

   $id = ($_POST['id']);
   $contenido = ($_POST['contenido']);
   
   
   $sql->consulta("UPDATE t_articulo set contenido='$contenido' where id_articulo='$id'");

       if ($sql->error()){
      ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error al insertar registro!</strong>
            
        </div>
        
      <?php
      }
      else{
      
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡el registro de insertó correctamente!</strong>
            
        </div>
      <?php

      }
          
        ?>