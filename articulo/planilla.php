<?php
  
  $raiz='../docs/';
  $title='prueba';
  include_once($raiz.'class/head.php');
  require($raiz."class/utilitario.php");
  $formato=new utilitariophp();
  $id_periodo=12;
  $filas=Array();
  $datos=Array();
  $array="SELECT dl.id_dato_laboral,e.dni_empleado,e.id_empleado,e.nom_empleado,e.ape_paterno,e.ape_materno from t_empleado e 
          inner join t_dato_laboral dl on dl.id_empleado=e.id_empleado
          inner join t_categoria_ocupacional co on co.id_categoria_ocupacional=dl.id_categoria_ocupacional
          inner join t_condicion_laboral cl on cl.id_condicion_laboral = dl.id_condicion_laboral
          inner join t_regimen_laboral rl on rl.id_regimen_laboral=dl.id_regimen_laboral
          inner join t_regimen_pensionario rp on rp.id_regimen_pensionario=dl.id_regimen_pensionario
          inner join t_perido_pago_ pp on pp.id_dato_laboral = dl.id_dato_laboral
          where dl.id_dato_laboral<>0
          and pp.id_periodo='$id_periodo'";
  $array1="SELECT tr.id_tipo_remuneracion,sigla from t_tipo_remuneracion tr inner join
          t_detalle_remuneracion_periodo tdr on tdr.id_tipo_remuneracion=tr.id_tipo_remuneracion
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_periodo='$id_periodo'
          group by tr.sigla,tr.id_tipo_remuneracion";
  $array2="SELECT tr.id_sub_comision,tr.nom_sub_comision from t_sub_comision tr inner join
          t_detalle_descuento_periodo tdr on tdr.id_sub_comision=tr.id_sub_comision
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_periodo='$id_periodo' and tr.aporte<>1
          group by tr.nom_sub_comision,tr.id_sub_comision";
  $array3="SELECT tr.id_sub_comision,tr.nom_sub_comision from t_sub_comision tr inner join
          t_detalle_descuento_periodo tdr on tdr.id_sub_comision=tr.id_sub_comision
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_periodo='$id_periodo' and tr.aporte=1
          group by tr.nom_sub_comision,tr.id_sub_comision";

  $linea = $sql->consulta($array);
  
  $i_fila=0;
   while($r = $sql->fetch_array($linea))
    {
      $con=0; 
      $con2=1;
      $con3=1;
      $total_r=0;
      $total_d=0;
      $total_a=0;
      $dato[0]=$r['dni_empleado'];
      $dato[1]=$r['nom_empleado'];
      $dato[2]='AFP/ONP';
      $dato[3]='00123';
      $id_dato_laboral=$r['id_dato_laboral'];
      $linea1 = $sql->consulta($array1);
      while($r1 = $sql->fetch_array($linea1))
       {
          $id_tipo_remuneracion=$r1['id_tipo_remuneracion'];
          $cons_remu="SELECT tr.nom_tipo_remuneracion,tdr.monto_remuneracion_periodo from  t_tipo_remuneracion tr inner join
          t_detalle_remuneracion_periodo tdr on tdr.id_tipo_remuneracion=tr.id_tipo_remuneracion
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_dato_laboral='$id_dato_laboral' and pp.id_periodo='$id_periodo' and tr.id_tipo_remuneracion='$id_tipo_remuneracion'";
          $num=$sql->numRegistros($cons_remu);
          if ($num>0) {
            $remu = $sql->consulta($cons_remu);
             while ($remu_r = $sql->fetch_array($remu))
               $monto_remu=$formato->formatMoney(number_format($remu_r[1], 2, '.', ''),true);
          }else{
            $monto_remu=$formato->formatMoney(number_format('0.00', 2, '.', ''),true);
          }
          $total_r+=$monto_remu;
          $dato[4+$con]=$monto_remu;
          $con++; 
       }  
       $dato[$con+4]=$formato->formatMoney(number_format($total_r, 2, '.', ''),true);
       $linea2 = $sql->consulta($array2);
        while($r2 = $sql->fetch_array($linea2))
       {
          $id_sub_comision=$r2['id_sub_comision'];
          $cons_desc="SELECT tr.nom_sub_comision,tdr.monto from  t_sub_comision tr inner join
          t_detalle_descuento_periodo tdr on tdr.id_sub_comision=tr.id_sub_comision
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_dato_laboral='$id_dato_laboral' and pp.id_periodo='$id_periodo' and tr.id_sub_comision='$id_sub_comision'";
          $num=$sql->numRegistros($cons_desc);
          if ($num>0) {
            $desc = $sql->consulta($cons_desc);
             while ($desc_r = $sql->fetch_array($desc))
               $monto_desc=$formato->formatMoney(number_format($desc_r[1], 2, '.', ''),true);
          }else{
            $monto_desc=$formato->formatMoney(number_format('0.00', 2, '.', ''),true);
          }
          $total_d+=$monto_desc;
          $dato[$con+$con2+4]=$monto_desc;
          $con2++; 
       } 
       $dato[$con+$con2+4]=$formato->formatMoney(number_format($total_d, 2, '.', ''),true);

      $linea2 = $sql->consulta($array3);
        while($r2 = $sql->fetch_array($linea2))
       {
          $id_sub_comision=$r2['id_sub_comision'];
          $cons_desc="SELECT tr.nom_sub_comision,tdr.monto from  t_sub_comision tr inner join
          t_detalle_descuento_periodo tdr on tdr.id_sub_comision=tr.id_sub_comision
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_dato_laboral='$id_dato_laboral' and pp.id_periodo='$id_periodo' and tr.id_sub_comision='$id_sub_comision'";
          $num=$sql->numRegistros($cons_desc);
          if ($num>0) {
            $desc = $sql->consulta($cons_desc);
             while ($aport_r = $sql->fetch_array($desc))
               $monto_a=$formato->formatMoney(number_format($aport_r[1], 2, '.', ''),true);
          }else{
            $monto_a=$formato->formatMoney(number_format('0.00', 2, '.', ''),true);
          }
          $total_a+=$monto_a;
          $dato[$con+$con2+$con3+4]=$monto_a;
          $con3++; 
       } 
       $dato[$con+$con2+$con3+4]=$formato->formatMoney(number_format($total_a, 2, '.', ''),true);
      
       $filas[$i_fila]=$dato;
       $i_fila++;     
    } 
  
?>

<div class="col-12">

   <div class="table-responsive" >
        <table id="order-listing" class="table" style='zoom:95%'>
            <thead>
              <tr class="bg-light text-dark">  
                 <th>Item</th>
                 <th>Dni/RUC</th>
                 <th>Nombre</th>
                 <th>afp</th>
                 <th>Cuss</th>
                 <?php
                 $linea1 = $sql->consulta($array1);
                 while($r = $sql->fetch_array($linea1))
                 {
                    echo '<th>'.$r[1].'</>';
                  
                 } ?>
                 <th>Total remuneraciones</th>
                 <?php
                 $linea2 = $sql->consulta($array2);
                 while($r = $sql->fetch_array($linea2))
                 {
                    echo '<th>'.$r[1].'</>';
                  
                 } ?>
                  <th>Total Descuentos</th>
                  <?php
                 $linea3 = $sql->consulta($array3);
                 while($r = $sql->fetch_array($linea3))
                 {
                    echo '<th>'.$r[1].'</>';
                  
                 } ?>
                  <th>Total Aportes</th>
                 <th>Sueldo Neto</th>
               </tr>
            </thead>
            <tbody>

             <?php
                 $n_filas=count($filas);
                 $n_datos=count($dato);
                
                 for ($i=0; $i< $n_filas ; $i++) { 
                  echo '<tr>';
                  echo '<td>'.($i+1).'</td>';
                       for ($j=0; $j< $n_datos ; $j++) { 
                           if ($j>3) {
                              echo '<td align="right">'.$filas[$i][$j].'</td>';
                            } else{
                              echo '<td>'.$filas[$i][$j].'</td>';
                            }      
                        }
                 echo '</tr>';    
               }
             ?>
            </tbody>
        </table>                    
    </div>
 </div>

