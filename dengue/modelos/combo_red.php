<?php

  $raiz = "../../docs/";
  require_once("../../docs/class/sentencias.php");
  $sql = new sentencias();
    
  $id_ogess = $_POST['id_ogess'];
  $id_ogess=intval($_REQUEST['id_ogess']);
	
  $linea1 = $sql->consulta("SELECT id_red, desc_red, cod_ugipress from red where cod_ugipress= '$id_ogess'");
  ?>
    
    <option selected value=""> Seleccionar Red de Salud</option>
<?php  
      foreach ($linea1 as $key ) {
      
           echo '<option value = "'.$key['id_red'].'">'.($key['desc_red']).'</option>';

          
        }
      

?>

