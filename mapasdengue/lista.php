<?php

$raiz = '../docs/';

include_once($raiz . 'class/head.php');

include_once($raiz . 'class/utilitario.php');

$formato = new utilitariophp();
$cons = "SELECT latitud, longitud from t_dengue";
$val = $sql->numRegistros($cons);

?>


<!--fin paginado-->

<div class="col-12">



  <?php

  if ($val > 0) {

  ?>


  <?php

  } else {

  ?>

    <div class="alert alert-info" role="alert">

      <p><i class="mdi mdi-alert-circle"></i> No se encontraron Registros en la tabla solicitada.</p>

      <p>
      <p><i class="fa fa-check"></i> Para comenzar a ingresar registros dar 'click' en el botón 'Nuevo' de la parte superior.</p>

    </div>

  <?php

  }

  ?>

</div>