<?php

$raiz = "../../docs/";

require_once("$raiz/class/sentencias.php");

$sql = new sentencias();

$id_red = $_POST['id_red'];
$id_red = intval($_REQUEST['id_red']);
$linea1 = $sql->consulta("SELECT cod_mred, nom_mred from micro_red 
inner join red on micro_red.cod_red =red.id_red
where cod_red= '$id_red'");

?>

<option selected value=""> Seleccionar Micro Red de Salud</option>
<?php
foreach ($linea1 as $key) {

  echo '<option value = "' . $key['cod_mred'] . '">' . ($key['nom_mred']) . '</option>';
}





?>