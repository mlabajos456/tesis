<?php
  $raiz = "../../docs/";
  require_once("$raiz/class/sentencias.php");
  $sql = new sentencias();
    
  $id_departamento = $_POST['id_departamento'];
  $id_departamento=intval($_REQUEST['id_departamento']);
  
     $linea1 = $sql->consulta("SELECT id_provincia,nom_provincia from t_provincia 
                                where id_departamento= '$id_departamento'");

      ?>
    
    <option selected value=""> Seleccionar un tipo de manejo del fallecido</option>
    <?php  
          foreach ($linea1 as $key ) {
            echo '<option value = "'.$key['id_provincia'].'">'.($key['nom_provincia']).'</option>';          
        }
      

?>

