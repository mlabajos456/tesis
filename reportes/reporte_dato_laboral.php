<?php
 $raiz = "..";
    
    $raiz = "../docs/";
    require($raiz."class/sentencias.php");
    require($raiz."class/utilitario.php");
    require('pdf_formato_recibo.php');
    $sql = new sentencias();
    $formato=new utilitariophp();
  
    $id=$_GET['codigo'];
    $id_periodo=$_GET['id_periodo'];
    date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");

    session_start();
   
    $p="SELECT m.id_periodo,m.ano_periodo,m.mes_periodo,m.mes  FROM t_periodo m where id_periodo='$id_periodo'";
    $linea=$sql->fetch_array($sql->consulta($p));
    $n_per=$linea['mes'].'('.$linea['ano_periodo'].')';
    if(!isset($_SESSION['nickname'])){
        header("Location: ./login.php");
     }
    $usuario = $sql->fetch_array($sql->consulta("SELECT * from  T_usuario u  WHERE u.nom_usuario = '".$_SESSION['nickname']."'"));


    $linea=$sql->consulta("SELECT e.id_empleado,e.nom_empleado,e.dni_empleado,e.img_empleado,e.direccion,dl.total_bruto,dl.total_descuento,dl.total_neto,co.nom_categoria_ocupacional,cl.nom_condicion_laboral,rl.nom_regimen_laboral,rp.nom_regimen_pensionario,dl.fecha_ingreso,dl.estado,dl.id_dato_laboral,e.ape_paterno,e.ape_materno from t_empleado e 
          inner join t_dato_laboral dl on dl.id_empleado=e.id_empleado
          inner join t_categoria_ocupacional co on co.id_categoria_ocupacional=dl.id_categoria_ocupacional
          inner join t_condicion_laboral cl on cl.id_condicion_laboral = dl.id_condicion_laboral
          inner join t_regimen_laboral rl on rl.id_regimen_laboral=dl.id_regimen_laboral
          inner join t_regimen_pensionario rp on rp.id_regimen_pensionario=dl.id_regimen_pensionario
          inner join t_perido_pago_ pp on pp.id_dato_laboral = dl.id_dato_laboral
          where dl.id_dato_laboral='$id' and pp.id_periodo='$id_periodo'");
      while($r = $sql->fetch_array($linea))
                 {
                              $fecha=$r['fecha_ingreso'];
                              $dni_empleado=$r['dni_empleado'];
                              $nom_empleado=$r['nom_empleado'];
                              $ape_paterno=$r['ape_paterno'];
                              $ape_materno=$r['ape_materno'];
                              $nom_categoria_ocupacional=$r['nom_categoria_ocupacional'];
                              $nom_regimen_laboral=$r['nom_regimen_laboral'];
                              $nom_condicion_laboral=$r['nom_condicion_laboral'];
                              $nom_regimen_pensionario=$r['nom_regimen_pensionario'];
                              $anio= substr($fecha,0,4);
                              $mes= substr($fecha,5,2);
                              $dia= substr($fecha,8,2);
                              $fecha=$dia."/".$mes."/".$anio;
                              $estado = ($r['estado']==1) ?'checked=""':'';      
                    
                    }

    $blanc="X";
    $contx = 1;
    $pdf=new PDF('L','mm','A5');


        
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetY(28);
        $pdf->SetX(150);
        
        $pdf->cabeza("PERIODO",188,8,utf8_decode(''));//-----------------------TITTLE
        $pdf->lineado('H');
        /*********************************************************************/

        $pdf->SetTextColor(0,0,0);

        $font='Arial';
        $size=7;
        $pdf->SetFont('times', 'B', 12);
        $pdf->SetY(0);
        $miCabecera = array('NRO DOCUMENTO','APE. Y NOMBRES','CARGO','REGIMEN LABORAL');
        $misDatos = array($dni_empleado,$ape_paterno.' '.$ape_materno.', '.$nom_empleado,$nom_categoria_ocupacional,$nom_regimen_laboral);

        

        $misDatos3 = array($n_per);//--------------------------------PERIODO

        

        $txtprocedencia = array('CATEGORIA');
        $dtprocedencia = array($nom_categoria_ocupacional);

        $txtaño = array('AÑO');
        $dtaño = array($anio);

        $txtmes = array('MES');
        $dtmes = array($mes);

        $txtdia = array('DÍA');
        $dtdia = array($dia);

        $tarray = array('CONDICION LABORAL','REGIMEN PENSIONARIO');
        $darray = array($nom_condicion_laboral,$nom_regimen_pensionario);

        

        //$pdf->cabeceraVertical($miCabecera,20,50);
        //$pdf->datosVerticales($misDatos,70,50);

        $pdf->SetY(100);
        $pdf->SetX(135);
        $pdf->SetTextColor(0,0,0);

        $pdf->SetFont('times','', 6);
        $pdf->SetY(28);
        $pdf->SetX(10);
        
        $pdf->Ln(0);


        //PARTE IZQUIERDA ------------------------------------------->

        $pdf->SetFillColor(232,232,232); 
        $pdf->cabeceraVertical($miCabecera,10,23,28,4,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos,38,23,70,4,$font,'',$size,'L');

        $pdf->datosVerticales($misDatos3,160,10,40,6,$font,'B',10,'C');

        //PARTE DERECHA ------------------------------------------->

        $pdf->cabeceraVertical($txtprocedencia,113,23,39,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dtprocedencia,113,27,39,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($txtaño,152,23,16,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dtaño,152,27,16,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($txtmes,168,23,16,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dtmes,168,27,16,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($txtdia,184,23,16,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dtdia,184,27,16,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($tarray,113,31,39,4,$font,'B',$size,'C');
        $pdf->datosVerticales($darray,152,31,48,4,$font,'',$size,'C');

       

        $pdf->SetX(10);
        $pdf->SetFont('times', '', 9);
        $pdf->SetFillColor(255,255,255);
        $pdf->Ln(5);
        ///$pdf->Cell(20, 10, utf8_decode('Detalle del ingreso asignado a cuentas de la empresa'), 0, 0, 'L', 1);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //Tabla remuneraciones
        $miCabecera = array( utf8_decode('INGRESOS '), utf8_decode('S/'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(255,255,255);//colorrr 113, 169, 232
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',$size);
        $pdf->SetX(10);
        //Cabecera
        $h=5;
        $w0=52;
        $w1=11;
        
        $bord=1;
        $fond=1;
        $contador=0;
      
             $pdf->Cell($w0, $h, $miCabecera[0], $bord, 0, 'C', $fond);
             $pdf->Cell($w1, $h, $miCabecera[1], $bord, 0, 'C', $fond);
       
        $pdf->Ln();
        //Restauración de colores y fuentes
        $pdf->SetFillColor(63, 123, 189);
        $pdf->SetTextColor(0);
        $size = 6;
        $pdf->SetFont($font,'',$size);
        $fill=false;
        
        $t_remu=0;
        $remuneraciones=$sql->consulta("SELECT tr.nom_tipo_remuneracion,drp.monto_remuneracion_periodo from t_tipo_remuneracion tr 
            inner join t_detalle_remuneracion_periodo drp on drp.id_tipo_remuneracion=tr.id_tipo_remuneracion
            inner join t_perido_pago_ pp on pp.id_periodo_pago=drp.id_periodo_pago
            inner join t_dato_laboral dl on dl.id_dato_laboral=pp.id_dato_laboral
            where dl.id_dato_laboral='$id' and pp.id_periodo='$id_periodo'");
        while($r = $sql->fetch_array($remuneraciones)){
            $t_remu+=$r['monto_remuneracion_periodo'];
            $pdf->SetX(10);
            $h=7;
            $borde=0;

            $pdf->Cell($w0,$h,$r['nom_tipo_remuneracion'],$borde,0,'C',$fill);
            $pdf->Cell($w1,$h,$formato->formatMoney(number_format($r['monto_remuneracion_periodo'], 2, '.', ''),true),$borde,0,'R',$fill);
            $pdf->Ln();
           // $fill=!$fill;
            $contador +=  1;
        }
         $pdf->SetY(44);
        
 //Tabla desc************************************************************************************************************
        $miCabecera = array( utf8_decode('DESCUENTOS '), utf8_decode(' S/'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(255,255,255);//colorrr 113, 169, 232
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',$size);
        $pdf->SetX(73);
        //Cabecera
        $h=5;
        
        $fond=1;
        $contador=0;
       // for ($i = 0; $i < count($miCabecera); $i++) {

             $pdf->Cell($w0, $h, $miCabecera[0], $bord, 0, 'C', $fond);
             $pdf->Cell($w1, $h, $miCabecera[1], $bord, 0, 'C', $fond);
       //  }
        $pdf->Ln();
        //Restauración de colores y fuentes
        $pdf->SetFillColor(245,245,245);
        $pdf->SetTextColor(0);
        $size = 6;
        $pdf->SetFont($font,'',$size);
        //Datos
        $t_desc=0;
        $fill=false;
        
        
       $descuentos=$sql->consulta("SELECT tr.nom_sub_comision,drp.monto from t_sub_comision tr 
            inner join t_detalle_descuento_periodo drp on drp.id_sub_comision=tr.id_sub_comision
            inner join t_perido_pago_ pp on pp.id_periodo_pago=drp.id_periodo_pago
            inner join t_dato_laboral dl on dl.id_dato_laboral=pp.id_dato_laboral
            where dl.id_dato_laboral='$id' and tr.aporte<>1 and pp.id_periodo='$id_periodo'");
         while($r = $sql->fetch_array($descuentos)){
            $t_desc+=$r['monto'];
            $pdf->SetX(73);
            $h=7;
            $pdf->Cell($w0,$h,$r['nom_sub_comision'],$borde,0,'C',$fill);
            $pdf->Cell($w1,$h,$formato->formatMoney(number_format($r['monto'], 2, '.', ''),true),$borde,0,'R',$fill);
            $pdf->Ln();
          //  $fill=!$fill;
            $contador +=  1;
        }
            $pdf->SetY(44);
 /**tabla aportes*****************************************************************************************************+*/
        $miCabecera = array( utf8_decode('APORTES '), utf8_decode(' S/'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(255,255,255);//colorrr 113, 169, 232
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',$size);
        $pdf->SetX(136);
        //Cabecera
        $h=5;
        
       
        $fond=1;
        $contador=0;
       // for ($i = 0; $i < count($miCabecera); $i++) {

             $pdf->Cell($w0, $h, $miCabecera[0], $bord, 0, 'C', $fond);
             $pdf->Cell($w1, $h, $miCabecera[1], $bord, 0, 'C', $fond);
       //  }
        $pdf->Ln();
        //Restauración de colores y fuentes
        $pdf->SetFillColor(245,245,245);
        $pdf->SetTextColor(0);
        $size = 6;
        $pdf->SetFont($font,'',$size);
        //Datos
        $total=0;
        $fill=false;
        $remu='AGUINALDO/GRATIFICACIONES';
        $monto_remu = 0;
        
       $aportes=$sql->consulta("SELECT tr.nom_sub_comision,drp.monto from t_sub_comision tr 
            inner join t_detalle_descuento_periodo drp on drp.id_sub_comision=tr.id_sub_comision
            inner join t_perido_pago_ pp on pp.id_periodo_pago=drp.id_periodo_pago
            inner join t_dato_laboral dl on dl.id_dato_laboral=pp.id_dato_laboral
            where dl.id_dato_laboral='$id' and tr.aporte=1 and pp.id_periodo='$id_periodo'");
         while($r = $sql->fetch_array($aportes)){
            $pdf->SetX(136);
            $h=7;
            $pdf->Cell($w0,$h,$r['nom_sub_comision'],$borde,0,'C',$fill);
            $pdf->Cell($w1,$h,$formato->formatMoney(number_format($r['monto'], 2, '.', ''),true),$borde,0,'R',$fill);
            $pdf->Ln();
        //    $fill=!$fill;
            $contador +=  1;
        }
/**/
       $w4=20;
       $w5=20;        
       $w6=20;
       $w7=20;
       $w8=20;

        $y=$pdf->GetY();
        $size = 7;
        $alto=5;
        /*
        $textTotal = array('REMUNERACIÓN BRUTA');
        $textTotal1 = array('TOTAL DESCUENTOS');
        $textTotal2 = array('TOTAL APORTES');
        $total_cantidad  = array(0);
        $total_pbruto  = array(0);
        $total_tara  = array(0);
        $total_pneto  = array(0);
        $total_precio  = array(0);
        $total_importe  = array(0);
        $pdf->cabeceraVertical($textTotal,10,$y,$w0,$alto,$font,'B',$size,'R');
        $pdf->datosVerticales($total_cantidad,62,$y,$w1,$alto,$font,'B',$size,'R');
        $pdf->cabeceraVertical($textTotal1,73,$y,$w0,$alto,$font,'B',$size,'R');
        $pdf->datosVerticales($total_cantidad,125,$y,$w1,$alto,$font,'B',$size,'R');
        $pdf->cabeceraVertical($textTotal2,136,$y,$w0,$alto,$font,'B',$size,'R');
        $pdf->datosVerticales($total_cantidad,188,$y,$w1,$alto,$font,'B',$size,'R');*/

 //---------- footer --------------------------********************************************************************************************---->
        $fill=true;
        $pdf->SetX(10);
        $pdf->Ln(5);
        $pdf->GetY();        
        $y = $pdf->GetY();
        if($y < 85){
            $pdf->SetY(85);
        }
        $y = $pdf->GetY();

        $pdf->SetY($y);
        
        $brd=1;
        $pdf->SetX(155);
        $pdf->SetFillColor(255,255,255);//colorrr 113, 169, 232
        $pdf->Cell(45,5, utf8_decode("TOTALES"), $brd, 0, 'C', 1);
        $pdf->SetY($y +5);
        $pdf->SetX(155);
        $pdf->SetFont($font,'',$size);
        $pdf->Cell(30,4, "REMUNERACION", $brd, 0, 'L', 0);
        $pdf->Cell(15,4,$formato->formatMoney(number_format($t_remu, 2, '.', ''),true), $brd, 0, 'R', 0);
        $pdf->Ln();
        $pdf->SetX(155);
        $pdf->Cell(30,4, "DESCUENTOS", $brd, 0, 'L', 0);
        $pdf->Cell(15,4,$formato->formatMoney(number_format($t_desc, 2, '.', ''),true), $brd, 0, 'R', 0);
        $neto=$t_remu-$t_desc;
        $pdf->Ln();
        $pdf->SetX(155);
        $pdf->Cell(30,4, "NETO", $brd, 0, 'L', 0);
        $pdf->Cell(15,4,$formato->formatMoney(number_format($neto, 2, '.', ''),true), $brd, 0, 'R', 0);

        $pdf->Ln();
        $pdf->SetX(178);
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(20, $h,'A PAGAR: '.$formato->convertir($neto), 0, 0,'R', 0);
        $pdf->SetY($y + 5);
        $y = $pdf->GetY();

        $m=19;
        
        $pdf->SetFont($font,'',6);
        $pdf->SetY($y + 20);
        $pdf->SetX(15);
        

        $pdf->SetY($y + 11+$m);
        $pdf->SetX(20);
        $pdf->Cell(60, 5, utf8_decode("________________________________"), 0, 0, 'C', 0);
        $pdf->SetY($y + 14+$m);
        $pdf->SetX(20);
        $pdf->Cell(60, 5, utf8_decode(""), 0, 0, 'C', 0);
        $pdf->SetY($y + 18+$m);
        $pdf->SetX(20);
       // $pdf->Cell(60, 5, utf8_decode("V° B° Control de Calidad"), 0, 0, 'C', 0);

        $pdf->SetY($y + 11 +$m);
        $pdf->SetX(75);
       // $pdf->Cell(60, 5, utf8_decode("________________________________"), 0, 0, 'C', 0);
        $pdf->SetY($y + 14 +$m);
        $pdf->SetX(75);
       // $pdf->Cell(60, 5, utf8_decode("Administrador Tesorero"), 0, 0, 'C', 0);
        $pdf->SetY($y + 18+$m);
        $pdf->SetX(75);

        $pdf->SetY($y + 11+$m);
        $pdf->SetX(130);
        $pdf->Cell(60, 5, utf8_decode("________________________________"), 0, 0, 'C', 0);
        $pdf->SetY($y + 14+$m);
        $pdf->SetX(130);
        $pdf->Cell(60, 5, utf8_decode("EMPLEADO"), 0, 0, 'C', 0);
        $pdf->SetY($y + 18+$m);
        $pdf->SetX(130);
       // $pdf->Cell(60, 5, utf8_decode("V° B° Gestor de Compras"), 0, 0, 'C', 0);
        $pdf->SetY($y + 23);
        $contx = $contx +1;
    

$pdf->Output();

   