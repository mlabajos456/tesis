<?php



$raiz = "../../docs/";

require_once("$raiz/class/sentencias.php");

$sql = new sentencias();

$cod_ugipress = $_POST['id_ogess'];

$cod_ugipress = intval($_REQUEST['id_ogess']);

$linea1 = $sql->consulta("SELECT id_red, desc_red, cod_ugipress from t_red where cod_ugipress = '$cod_ugipress'");

?>



<option selected value=""> Seleccionar Red de Salud</option>
<?php

foreach ($linea1 as $key) {
  echo '<option value = "' . $key['id_red'] . '">' . ($key['desc_red']) . '</option>';
}





?>