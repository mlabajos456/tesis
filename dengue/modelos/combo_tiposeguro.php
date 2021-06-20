<?php
  $raiz = "../../docs/";
  require_once("$raiz/class/sentencias.php");
  $sql = new sentencias();
    
  $id_tipo_regimen = $_POST['id_tipo_regimen'];
  $id_tipo_regimen=intval($_REQUEST['id_tipo_regimen']);
	
     $linea1 = $sql->consulta("SELECT id_seguro,descripcion from tipo_seguro 
                                where id_tipo_reg= '$id_tipo_regimen'");

      ?>
    
    <option selected value=""> Seleccionar un tipo de seguro</option>
    <?php  
          foreach ($linea1 as $key ) {
            echo '<option value = "'.$key['id_seguro'].'">'.($key['descripcion']).'</option>';          
        }
      

?>

