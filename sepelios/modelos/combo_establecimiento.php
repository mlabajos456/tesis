<?php
  $raiz = "../../docs/";
  require_once("$raiz/class/sentencias.php");
  $sql = new sentencias();
    
  $id_mred = $_POST['id_mred'];
  $id_mred=intval($_REQUEST['id_mred']);
	
     $linea1 = $sql->consulta("SELECT cod_unico, nom_est_salud from establecimiento_salud 
                                where cod_mred= '$id_mred'");

      ?>
    
    <option selected value=""> Seleccionar Establecimiento de Salud</option>
    <?php  
          foreach ($linea1 as $key ) {
            echo '<option value = "'.$key['cod_unico'].'">'.($key['nom_est_salud']).'</option>';          
        }
      

?>

