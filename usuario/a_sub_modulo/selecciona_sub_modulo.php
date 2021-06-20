<?php

 $raiz = "../../docs/";

  require_once("$raiz/class/sentencias.php");
  $sql = new sentencias();
    
  $id_modulo = $_POST['id_modulo'];
  $id_modulo=intval($_REQUEST['id_modulo']);
	
  $linea1 = $sql->consulta("SELECT * FROM t_sub_modulo m where m.id_modulo = '$id_modulo'");
      while($rows = pg_fetch_array($linea1))
        {
            echo '<option value = "'.$rows['id_sub_modulo'].'">'.strtoupper($rows['nom_sub_modulo']).'</option>';
        }
    
?>