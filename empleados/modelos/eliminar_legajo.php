<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $id = utf8_decode($_POST['id']);
   
    $sql->consulta("DELETE FROM t_legajo l where l.id_legajo='$id'");

       if ($sql->error()){
      ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡No se pudo eliminar el archivo!</strong>
            
        </div>
        
      <?php
      }
      else{
       
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡eliminación correcta!</strong>
                <script>
                 $(document).ready(function(){
                var id=$("#id_e").val();
                load(1,id);
                });
                </script>  
        </div>
      <?php

      }
          
        ?>
