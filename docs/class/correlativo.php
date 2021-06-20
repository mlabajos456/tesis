<?php

  require_once("sentencias.php");
  
  class correlativo{
  	public function empleado(){

  		$sql = new sentencias();
  		$existencia= $sql->numRegistros("SELECT p.nro_empleado FROM t_empleado p order by p.nro_empleado desc ");
               if($existencia==0){
                    $correlativo ="0001";
               }else{
                  $linea = $sql->consulta("SELECT p.nro_empleado FROM t_empleado p order by p.nro_empleado desc ");
	              $r = $r = $sql->fetch_array($linea);
	              $numero_anterior = $r[0];
	              $numero_recortado = substr($numero_anterior,0, 4);
	              $numero_recortado = (int)$numero_recortado;
	              $numero_actual = $numero_recortado +1;
	              $i = strlen($numero_actual);

	              switch ($i) {
	                  case 1:
	                      $correlativo ="000".$numero_actual;
	                      break;
	                  case 2:
	                      $correlativo ="00".$numero_actual;
	                      break;
	                  case 3:
	                      $correlativo ="0".$numero_actual;
	                      break;
	                  case 4:
	                      $correlativo ="".$numero_actual;
	                      break;
	                }

               }
               return $correlativo;
     	}


      	public function dato_lab(){

  		$sql = new sentencias();
  		$existencia= $sql->numRegistros("SELECT p.codigo FROM t_dato_laboral p order by p.codigo desc ");
               if($existencia==0){
                    $correlativo ="0001";
               }else{
                  $linea = $sql->consulta("SELECT p.codigo FROM t_dato_laboral p order by p.codigo desc ");
	              $r = $r = $sql->fetch_array($linea);
	              $numero_anterior = $r[0];
	              $numero_recortado = substr($numero_anterior,3, 4);
	              $numero_recortado = (int)$numero_recortado;
	              $numero_actual = $numero_recortado +1;
	              $i = strlen($numero_actual);

	              switch ($i) {
	                  case 1:
	                      $correlativo ="DL-000".$numero_actual;
	                      break;
	                  case 2:
	                      $correlativo ="DL-00".$numero_actual;
	                      break;
	                  case 3:
	                      $correlativo ="DL-0".$numero_actual;
	                      break;
	                  case 4:
	                      $correlativo ="DL-".$numero_actual;
	                      break;
	                }

               }
               return $correlativo;
     	} 	
  }
 

?>