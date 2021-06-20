<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $id_condicion_laboral = utf8_decode($_POST['id_condicion_laboral']);
   $nom_condicion_laboral =$_POST['nom_condicion_laboral'];
   

   $sql->consulta("UPDATE t_condicion_laboral set nom_condicion_laboral='$nom_condicion_laboral'
      where id_condicion_laboral='$id_condicion_laboral'");

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


        