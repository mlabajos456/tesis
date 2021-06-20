<?php

 $raiz = "../docs/";

  require_once("$raiz/class/sentencias.php");
  $sql = new sentencias();
    
  $id_gerencia = $_POST['id_gerencia'];
  $id_gerencia=intval($_REQUEST['id_gerencia']);
	
  $linea1 = $sql->consulta("SELECT * FROM t_oficina m where m.id_gerencia = '$id_gerencia'");
      while($rows = pg_fetch_array($linea1))
        {
            echo '<option value = "'.$rows['id_oficina'].'">'.utf8_encode( $rows['nom_oficina']).'</option>';
        }
    
?>