
<?php 
  session_start();
	$raiz = "../docs/";
  require($raiz."class/sentencias.php");
  require($raiz."class/utilitario.php");
  $formato=new utilitariophp();
  $sql = new sentencias();
  $cons="SELECT e.id_empleado,e.nom_empleado,e.dni_empleado,e.img_empleado,e.direccion,dl.total_bruto,dl.total_descuento,dl.total_neto,co.nom_categoria_ocupacional,cl.nom_condicion_laboral,rl.nom_regimen_laboral,rp.nom_regimen_pensionario,dl.fecha_ingreso,dl.estado,dl.id_dato_laboral,e.ape_materno,e.ape_paterno from t_empleado e 
  inner join t_dato_laboral dl on dl.id_empleado=e.id_empleado
  inner join t_categoria_ocupacional co on co.id_categoria_ocupacional=dl.id_categoria_ocupacional
  inner join t_condicion_laboral cl on cl.id_condicion_laboral = dl.id_condicion_laboral
  inner join t_regimen_laboral rl on rl.id_regimen_laboral=dl.id_regimen_laboral
  inner join t_regimen_pensionario rp on rp.id_regimen_pensionario=dl.id_regimen_pensionario";
	
  $linea=$sql->consulta("SELECT mes,ano_periodo from t_periodo where id_periodo='".$_SESSION['id_periodo']."'");
  while ($r=$sql->fetch_array($linea)) {
    $nom_mes=$r[0];
    $ano_periodo=$r['ano_periodo'];
  }
		$filename = "dato_laboral_".date('Ymd') . ".xls";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		$show_coloumn = false;
		?>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <h2>Registro de Dato Laboral periodo <?php echo $nom_mes;?>, <?= $ano_periodo?></h2>    
		<table border="1">
            <thead>
              <tr style="background-color:#297EDE;"style="color:#E6EFF9"; >
                 
                 <th>Id</th>
                 <th>Dni</th>
                 <th>Nombre</th>
                 <th>Dirección</th>
                 <th>Sueldo Bruto</th>
                 <th>Descuentos</th>
                 <th>Sueldo Neto</th>
                 <th>Cat Ocupacional</th>
                 <th>Cond Laboral</th>    
                 <th>Reg Laboral</th>
                 <th>Reg Pensionario</th>
                 <th>Estado</th>
                 
               </tr>
            </thead>
            <tbody>
             <?php
             $linea = $sql->consulta($cons);
              while($r = pg_fetch_array($linea))
                 {
                              $bruto=$sql->consulta("SELECT SUM(d.monto_remuneracion_periodo) from t_detalle_remuneracion_periodo d 
                              inner join t_perido_pago_ pp on pp.id_periodo_pago=d.id_periodo_pago
                              inner join t_dato_laboral dl on dl.id_dato_laboral=pp.id_dato_laboral
                              where dl.id_dato_laboral=".$r['id_dato_laboral']);
                               while($fila = $sql->fetch_array($bruto))
                              $t_bruto=$fila[0];
                              $desc=$sql->consulta("SELECT SUM(d.monto) from t_detalle_descuento_periodo d 
                              inner join t_perido_pago_ pp on pp.id_periodo_pago=d.id_periodo_pago
                              inner join t_dato_laboral dl on dl.id_dato_laboral=pp.id_dato_laboral
                              inner join t_sub_comision tr on tr.id_sub_comision=d.id_sub_comision
                              where dl.id_dato_laboral=".$r['id_dato_laboral']." and tr.aporte<>1");
                               while($fila = $sql->fetch_array($desc))
                              $t_desc=$fila[0];
                              $t_neto=$t_bruto-$t_desc;
                              $fecha=$r['fecha_ingreso'];
                              $anio= substr($fecha,0,4);
                              $mes= substr($fecha,5,2);
                              $dia= substr($fecha,8,2);
                              $fecha=$dia."/".$mes."/".$anio;
                              $estado = ($r['estado']==1) ?'Activo':'Inactivo';
                              $nombre=$r['nom_empleado'].' '.$r['ape_paterno'].' '.$r['ape_materno'];
                    ?>
              <tr>
                
                <td><?=$r[0]?></td>
                <td><?=$r['dni_empleado']?></td>
                <td><?=$nombre?></td>
                <td><?=$r['direccion']?></td>
                <td style="color:#2979DE";><?=$formato->formatMoney(number_format($t_bruto, 2, '.', ''),true)?></td>
                <td style="color:#FF0000";><?=$formato->formatMoney(number_format($t_desc, 2, '.', ''),true)?></td>
                <td style="font-weight: bold;"><?=$formato->formatMoney(number_format($t_neto, 2, '.', ''),true)?></td>
                <td><?=$r['nom_categoria_ocupacional']?></td>
                <td><?=$r['nom_condicion_laboral']?></td>
                <td><?=$r['nom_regimen_laboral']?></td>
                <td><?=$r['nom_regimen_pensionario']?></td>
                <td><?=$estado?></td>
                
               </tr>
           <?php } ?>
            </tbody>
        </table> 

 
