<?php
  $raiz = "../../docs/";
  require_once("$raiz/class/sentencias.php");
  $sql = new sentencias();
    
  $id_man_falle = $_POST['id_man_falle'];
  $id_man_falle=intval($_REQUEST['id_man_falle']);
	
     $linea1 = $sql->consulta("SELECT id_crema_inhu,desc_orden from orden_cremacion 
                                where id_man_falle= '$id_man_falle'");

      ?>
    
    <option selected value=""> Seleccionar un tipo de manejo del fallecido</option>
    <?php  
          foreach ($linea1 as $key ) {
            echo '<option value = "'.$key['id_crema_inhu'].'">'.($key['desc_orden']).'</option>';          
        }
      

?>

