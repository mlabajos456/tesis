<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $nom_condicion_laboral = $_POST['nom_condicion_laboral'];
   
     $sql->consulta("INSERT into t_condicion_laboral (nom_condicion_laboral) values('$nom_condicion_laboral')");

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


        