<?php
  $raiz = "../../docs/";
  require_once("$raiz/class/sentencias.php");
  $sql = new sentencias();
    
  $id_provincia = $_POST['id_provincia'];
  $id_provincia=intval($_REQUEST['id_provincia']);
	
     $linea1 = $sql->consulta("SELECT id_distrito,nom_distrito from t_distrito 
                                where id_provincia= '$id_provincia'");

      ?>
    
    <option selected value=""> Seleccionar un tipo de manejo del fallecido</option>
    <?php  
          foreach ($linea1 as $key ) {
            echo '<option value = "'.$key['id_distrito'].'">'.($key['nom_distrito']).'</option>';          
        }
      

?>

