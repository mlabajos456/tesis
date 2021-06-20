
<?php
    require ("curl.php");
    require ("sunat.php");
    $cliente = new Sunat();
    $documento = $_GET['documento'];
    
//    $ruc="10434933582";
    echo json_encode( $cliente->BuscaDatosSunat($documento), JSON_PRETTY_PRINT );
   
?>
