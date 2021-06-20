<?php
  session_start();
  $raiz='../docs/';
  $title='prueba';
  include_once($raiz.'class/sentencias.php');
  require($raiz."class/utilitario.php");
  $sql = new sentencias();
  $formato=new utilitariophp();
  $id_periodo=$_GET['id_periodo'];
  $id_regimen_laboral=$_GET['id_regimen_laboral'];
  $id_categoria_ocupacional=$_GET['id_categoria_ocupacional'];
  $id_condicion_laboral=$_GET['id_condicion_laboral'];
  $id_meta=$_GET['id_meta'];
  $id_periodo=$_GET['id_periodo'];
  $filtro1 = ($id_regimen_laboral!=0)?"where rl.id_regimen_laboral='$id_regimen_laboral'":'where rl.id_regimen_laboral<>0';
  $filtro2 = ($id_categoria_ocupacional!=0)?" and co.id_categoria_ocupacional='$id_categoria_ocupacional'":'and co.id_categoria_ocupacional<>0';
  $filtro3 = ($id_condicion_laboral!=0) ?" and cl.id_condicion_laboral='$id_condicion_laboral'":'and cl.id_condicion_laboral<>0';
  $filtro4 = ($id_meta!=0) ?" and m.id_meta='$id_meta'":' and m.id_meta<>0';
  $filtro5 = ($id_periodo!=0) ?" and p.id_periodo='$id_periodo'":' and p.id_periodo<>0';
  $sql_filtro=$filtro1.$filtro2.$filtro3.$filtro4.$filtro5;

  $linea=$sql->consulta("SELECT mes,ano_periodo from t_periodo where id_periodo='".$id_periodo."'");
  while ($r=$sql->fetch_array($linea)) {
    $nom_mes=$r[0];
    $ano_periodo=$r['ano_periodo'];
  }

  $filas=Array();
  $datos=Array();
  $array="SELECT dl.id_dato_laboral,e.dni_empleado,e.id_empleado,e.nom_empleado,e.ape_paterno,e.ape_materno,e.nro_cus, p.mes,dl.id_regimen_pensionario from t_empleado e 
          inner join t_dato_laboral dl on dl.id_empleado=e.id_empleado
          inner join t_categoria_ocupacional co on co.id_categoria_ocupacional=dl.id_categoria_ocupacional
          inner join t_condicion_laboral cl on cl.id_condicion_laboral = dl.id_condicion_laboral
          inner join t_regimen_laboral rl on rl.id_regimen_laboral=dl.id_regimen_laboral
          inner join t_meta m on m.id_meta=dl.id_meta
          inner join t_regimen_pensionario rp on rp.id_regimen_pensionario=dl.id_regimen_pensionario
          inner join t_perido_pago_ pp on pp.id_dato_laboral = dl.id_dato_laboral
          inner join t_periodo p on pp.id_periodo = p.id_periodo ".$sql_filtro;
  $array1="SELECT tr.id_tipo_remuneracion,sigla from t_tipo_remuneracion tr inner join
          t_detalle_remuneracion_periodo tdr on tdr.id_tipo_remuneracion=tr.id_tipo_remuneracion
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_periodo='$id_periodo'
          group by tr.sigla,tr.id_tipo_remuneracion";
  $array2="SELECT tr.id_sub_comision,tr.sigla from t_sub_comision tr inner join
          t_detalle_descuento_periodo tdr on tdr.id_sub_comision=tr.id_sub_comision
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_periodo='$id_periodo' and tr.aporte<>1
          group by tr.sigla,tr.id_sub_comision order by id_sub_comision";
  $array3="SELECT tr.id_sub_comision,tr.sigla from t_sub_comision tr inner join
          t_detalle_descuento_periodo tdr on tdr.id_sub_comision=tr.id_sub_comision
          inner join t_perido_pago_ pp on pp.id_periodo_pago=tdr.id_periodo_pago
          where pp.id_periodo='$id_periodo' and tr.aporte=1
          group by tr.sigla,tr.id_sub_comision";

  $linea = $sql->consulta($array);
  
  $i_fila=0;
   while($r = $sql->fetch_array($linea))
    {
      $con=0; 
      $con2=1;
      $con3=1;
      $total_neto=0;
      $total_r=0;
      $total_d=0;
      $total_a=0;
      $id_dato_laboral=$r['id_dato_laboral'];
      if($r['id_regimen_pensionario']==1){
          $dato[2]='ONP';
      }else{
        $linea4=$sql->consulta("SELECT dl.id_dato_laboral,td.nom_tipo_descuento  from  t_dato_laboral dl 
        
       
          inner join t_perido_pago_ pp on pp.id_dato_laboral = dl.id_dato_laboral
          inner join t_periodo p on pp.id_periodo = p.id_periodo 
      inner join t_detalle_descuento_periodo ddp on ddp.id_periodo_pago= pp.id_periodo_pago
      inner join t_sub_comision sc on sc.id_sub_comision = ddp.id_sub_comision
      inner join t_comision c on c.id_comision = sc.id_comision
      inner join t_tipo_descuento td on td.id_tipo_descuento = c.id_tipo_descuento
    where td.es_afp=1 and dl.id_dato_laboral='$id_dato_laboral' and pp.id_periodo='$id_periodo'
    group by  dl.id_dato_laboral,td.nom_tipo_descuento");
        while($r6= $sql->fetch_array($linea4)){$afp=$r6['nom_tipo_descuento'];}
        $dato[2]=$afp;
      }
      $dato[0]=$r['dni_empleado'];
      $dato[1]=$r['nom_empleado'].' '.$r['ape_paterno'].' '.$r['ape_materno'];
      
      $dato[3]=$r['nro_cus'];

      
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
          $dato[4+$con]=$formato->formatMoney(number_format($monto_remu, 2, '.', ''),true);
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
       $dato[$con+$con2+$con3+5]=$formato->formatMoney(number_format($total_r-($total_d), 2, '.', ''),true);
       $filas[$i_fila]=$dato;
       $i_fila++;     
    } 
    $filename = "planilla_general_".date('Ymd') . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $show_coloumn = true;
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <h2>Municipalidad Provincial de Rioja</h2>        
  <div align="center"><h2>Planilla del mes de <?php echo $nom_mes.' '. $ano_periodo?> </h2></div>
  <?php
       $cons=("SELECT co.nom_categoria_ocupacional,cl.nom_condicion_laboral,rl.nom_regimen_laboral,pp.fecha_periodo_pago ,rp.nom_regimen_pensionario,dl.id_dato_laboral,m.nom_meta from t_empleado e 
      inner join t_dato_laboral dl on dl.id_empleado=e.id_empleado
      inner join t_categoria_ocupacional co on co.id_categoria_ocupacional=dl.id_categoria_ocupacional
      inner join t_condicion_laboral cl on cl.id_condicion_laboral = dl.id_condicion_laboral
      inner join t_regimen_laboral rl on rl.id_regimen_laboral=dl.id_regimen_laboral
      inner join t_meta m on m.id_meta=dl.id_meta
      inner join t_perido_pago_ pp on pp.id_dato_laboral=dl.id_dato_laboral
      inner join t_periodo p on p.id_periodo=pp.id_periodo
      inner join t_regimen_pensionario rp on rp.id_regimen_pensionario=dl.id_regimen_pensionario ".$sql_filtro);
      $linea = $sql->consulta($cons);
              while($r = $sql->fetch_array($linea))
                 {
                  $regimen_laboral=$r['nom_regimen_laboral'];
                  $categoria_ocupacional=$r['nom_categoria_ocupacional'];
                  $condicion_laboral=$r['nom_condicion_laboral'];
                  $meta=$r['nom_meta'];
                  }
      if ($id_regimen_laboral!=0){
       echo '<div align="left"><label>Regimen Laboral: '.$regimen_laboral.'</label></div>' ;

      }else{ echo '<div align="left"><label>Todos los Regimenes</label></div>';
       }
       if ($id_categoria_ocupacional!=0){
       echo '<div align="left"><label>Categoria Ocupacional: '.$categoria_ocupacional.'</label></div>' ;

      }else{ 
         echo '<div align="left"><label>Todas Las Categorias Ocupacionales</label></div>';
       } 
       if ($id_condicion_laboral!=0){
       echo '<div align="left"><label>Condicional Laboral: '.$condicion_laboral.'</label></div>' ;

      }else{ echo '<div align="left"><label>Todas Las Condiciones laborales</label></div>';
       } 
       if ($id_meta!=0){
       echo '<div align="left"><label>Meta: '.$meta.'</label></div>' ;

      }else{echo '<div align="left"><label>Todas Las Metas</label></div>';
       } 

     
  ?>
  
    <table border="1">
            <thead>
              <tr> <th COLSPAN=5> DATOS DEL EMPLEADO</th>
                   <th COLSPAN="<?php echo $con+1?>" >REMUNERACIONES</th>
                   <th COLSPAN="<?php echo $con2?>" >DESCUENTOS</th>
                   <th COLSPAN="<?php echo $con3?>" >APORTES</th>
                   <th COLSPAN="1>" >SUELDO NETO</th>
              </tr>
              <tr>  
                
                 <td>Item</td>
                 <td>Dni/RUC</td>
                 <td>Nombre</td>
                 <td>afp</td>
                 <td>Cuss</td>

                 <?php
                 $linea1 = $sql->consulta($array1);
                 while($r = $sql->fetch_array($linea1))
                 {
                    echo '<td>'.$r[1].'</>';
                  
                 } ?>

                 <td>TOTAL REMUNERACIONES</td>
                 <?php
                 $linea2 = $sql->consulta($array2);
                 while($r = $sql->fetch_array($linea2))
                 {
                    echo '<td>'.$r[1].'</>';
                  
                 } ?>
                  <td>TOTAL DESCUENTO</td>
                  <?php
                 $linea3 = $sql->consulta($array3);
                 while($r = $sql->fetch_array($linea3))
                 {
                    echo '<th>'.$r[1].'</>';
                  
                 } ?>
                  <td>TOTAL APORTES</td>
                 <td>NETO</td>
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
                           if ($j>4) {
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


