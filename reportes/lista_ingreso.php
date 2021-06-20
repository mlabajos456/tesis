<?php
 $raiz = "..";
    
    require("../class/sentencias.php");
    require('pdf_lista_ingreso.php');
    require_once("../php/utilitario.php");
    $formato=new utilitariophp();
    $sql = new sentencias();
    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];
    $id_usuario = $_GET['id_usuario'];
    $fechas=($desde!=0 and $hasta!=0)? "and fecha_ingreso between '$desde' and '$hasta'":" ";


    date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");
    $blanc="X";
    $contx = 1;
    $pdf=new PDF('L','mm','A4');
    $pdf->SetMargins(10, 20 , 0);
    $pdf->SetAutoPageBreak(true,38);
//OSTIABIENDA

    $detalle = $sql->consulta("SELECT i.id_ingreso, p.nom_proveedor, i.fecha_ingreso, i.cantidad_ingreso, i.peso_bruto_ingreso, i.tara_ingreso, i.peso_neto_ingreso, i.estado_ingreso, al.nom_almacen, i.nro_ingreso, pr.nom_producto
      from T_ingreso as i
      inner join T_ciudad as a on a.id_ciudad = i.id_ciudad
      inner join T_detalle_razon_social_almacen as dra on dra.id_almacen = i.id_almacen
      inner join T_detalle_ingreso as di on di.id_ingreso = i.id_ingreso
      inner join T_producto as pr on pr.id_producto = di.id_producto
      inner join t_detalle_almacen_empleado as dae on dae.id_detalle_razon_social_almacen = dra.id_detalle_razon_social_almacen
      inner join T_dato_laboral_empleado as dle on dle.id_dato_laboral_empleado = dae.id_dato_laboral_empleado
      inner join T_empleado as e on e.id_empleado = dle.id_empleado
      inner join T_usuario as u on u.id_empleado = e.id_empleado
      inner join T_proveedor as p on p.id_proveedor = i.id_proveedor
      inner join T_almacen as al on al.id_almacen = i.id_almacen
      where u.id_usuario = $id_usuario ".$fechas."
      order by i.id_ingreso");
        
       
        $pdf->AliasNbPages();
        $pdf->AddPage();

        
        /*********************************************************************/

        $pdf->SetTextColor(0,0,0);
        $aniod= substr($desde,0,4);
        $mesd= substr($desde,5,2);
        $diad= substr($desde,8,2);

        $anioh= substr($hasta,0,4);
        $mesh= substr($hasta,5,2);
        $diah= substr($hasta,8,2);

        $pdf->SetFont('times', '', 10);
        $pdf->SetY(6);
        $pdf->SetX(245);
        $pdf->Cell(40, 5, 'DESDE:   '. $diad . "-". $mesd ."-" .$aniod,0, 0, 'R', 0);
        $pdf->Ln();
        $pdf->SetX(245);
        $pdf->Cell(40, 5, 'HASTA:   ' . $diah . "-". $mesh ."-" .$anioh, 0, 0, 'R', 0);

        $pdf->SetFont('Times','',8);
            $pdf->SetY(10);

            $pdf->cabeza("REGISTRO DE CONTROL DE CALIDAD DE",110,10,utf8_decode('INGRESO DE GRANO'),128);
            $pdf->lineado('H');

        $font='Arial';
        $size=8;
        $pdf->SetFont('times', 'B', 12);
        $pdf->SetY(0);
        $miCabecera = array('PROVEEDOR','DIRECCIÓN');
       

        $txt_nro_guia = array('NR° GUIA');
        $dt_nro_guia = array('');

        //$pdf->cabeceraVertical($miCabecera,20,50);
        //$pdf->datosVerticales($misDatos,70,50);

        $pdf->SetY(18);
        $pdf->SetX(135);
        $pdf->SetTextColor(0,0,0);

        //PARTE DERECHA ------------------------------------------->

        $pdf->SetX(10);
        $pdf->SetFont('times', '', 9);
        $pdf->SetFillColor(255,255,255);
        $pdf->Ln(5);
       // $pdf->Cell(20, 10, utf8_decode('Detalle del ingreso asignado a cuentas de la empresa'), 0, 0, 'L', 1);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //Tabla coloreada
        $miCabecera = array( utf8_decode('ZONA'), utf8_decode('PRODUCTO'),utf8_decode('PROVEEDOR'),'MEDIDA','CANTIDAD','P. BRUTO',"TARA",'P. NETO','N','FECHA', utf8_decode('N° INGRESO'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',$size);
        $pdf->SetX(10);
        //Cabecera
        $h=5;

        $w0=9;
        $w1=30;
        $w2=59;
        $w3=64;
        $w4=12;
        $w5=17;
        $w6=17;
        $w7=14;
        $w8=17;
        $w9=17;
        $w10=19;
       // for ($i = 0; $i < count($miCabecera); $i++) {
             $pdf->Cell($w0, $h, $miCabecera[8], 1, 0, 'C', 1);
             $pdf->Cell($w10, $h, $miCabecera[10], 1, 0, 'C', 1);
             $pdf->Cell($w1, $h, $miCabecera[0], 1, 0, 'C', 1);
             $pdf->Cell($w9, $h, $miCabecera[9], 1, 0, 'C', 1);
             $pdf->Cell($w2, $h, $miCabecera[1], 1, 0, 'C', 1);
             $pdf->Cell($w3, $h, $miCabecera[2], 1, 0, 'C', 1);
             $pdf->Cell($w4, $h, $miCabecera[3], 1, 0, 'C', 1);
             $pdf->Cell($w5, $h, $miCabecera[4], 1, 0, 'C', 1);
             $pdf->Cell($w6, $h, $miCabecera[5], 1, 0, 'C', 1);
             $pdf->Cell($w7, $h, $miCabecera[6], 1, 0, 'C', 1);
             $pdf->Cell($w8, $h, $miCabecera[7], 1, 0, 'C', 1);
       //  }
        $pdf->Ln();
        //Restauración de colores y fuentes
        $pdf->SetFillColor(245,245,245);
        $pdf->SetTextColor(0);
        $size = 7;
        $pdf->SetFont($font,'',$size);
        //Datos
        $total=0;
        $fill=false;
        $total_cantidad = 0;
        $total_pbruto = 0;
        $total_tara = 0;
        $total_pneto = 0;
        $contador = 1;
        while($r8 = pg_fetch_array($detalle)){

            $id_ingreso = $r8[0];
            $producto = $r8[10];
            $nom_proveedor = $r8[1];
            $fecha_ingreso = $r8[2];
            $medida ="KG";
            $cantidad = $r8[3];
            $peso_bruto = $r8[4];
            $tara = $r8[5];
            $peso_neto = $r8[6];
            $nom_almacen = $r8[8];
            $num_ingreso = $r8[9];

           

            $anio= substr($fecha_ingreso,0,4);
            $mes= substr($fecha_ingreso,5,2);
            $dia= substr($fecha_ingreso,8,2);
            $fecha_ingreso = $dia.'/'.$mes.'/'.$anio;
            

            $total_cantidad = $total_cantidad + $cantidad;
            $total_pbruto = $total_pbruto + $peso_bruto;
            $total_tara = $total_tara + $tara;
            $total_pneto = $total_pneto + $peso_neto;

            $pdf->SetX(10);
            $h=5;
            $borde=1;
            $pdf->Cell($w0,$h,$contador,$borde,0,'C',$fill);
            $pdf->Cell($w10,$h,utf8_decode($num_ingreso),$borde,0,'C',$fill);
            $pdf->Cell($w1,$h,utf8_decode($nom_almacen),$borde,0,'C',$fill);
            $pdf->Cell($w9,$h,$fecha_ingreso,$borde,0,'C',$fill);
            $pdf->Cell($w2,$h,utf8_decode($producto),$borde,0,'C',$fill);
            $pdf->Cell($w3,$h,utf8_decode($nom_proveedor),$borde,0,'L',$fill);
            $pdf->Cell($w4,$h,utf8_decode($medida),$borde,0,'C',$fill);
            $pdf->Cell($w5,$h,$cantidad,$borde,0,'C',$fill);
            $pdf->Cell($w6,$h,$peso_bruto,$borde,0,'C',$fill);
            $pdf->Cell($w7,$h,$tara,$borde,0,'C',$fill);
            $pdf->Cell($w8,$h,$peso_neto,$borde,0,'C',$fill);
            $pdf->Ln();
            $fill=!$fill;
            $contador = $contador + 1;

        }
        $y=$pdf->GetY();
        $pdf->Ln();
        $size = 8;
        $textTotal = array('TOTALES');
        $total_cantidad  = array($total_cantidad);
        $total_pbruto  = array($total_pbruto);
        $total_tara  = array($total_tara);
        $total_pneto  = array($total_pneto );
        $pdf->cabeceraVertical($textTotal,10,$y,$w0 + $w1 + $w10 + $w9 + $w2 + $w3 + $w4 ,5,$font,'B',$size,'R');
        $pdf->datosVerticales($total_cantidad,10 + $w0 + $w1 + $w10 + $w9 + $w2 + $w3 + $w4 ,$y,$w5,5,$font,'B',$size,'C');
        $pdf->datosVerticales($total_pbruto,10 + $w0 + $w1 + $w10 + $w9 + $w2 + $w3 + $w4 + $w5 ,$y,$w6,5,$font,'B',$size,'C');
        $pdf->datosVerticales($total_tara,10 + $w0 + $w1 + $w10 + $w9 + $w2 + $w3 + $w4 + $w5 + $w6,$y,$w7,5,$font,'B',$size,'C');
        $pdf->datosVerticales($total_pneto,10 +  $w0 + $w1 + $w10 + $w9 + $w2 + $w3 + $w4 + $w5 + $w6 + $w7 ,$y,$w8,5,$font,'B',$size,'C');


        //---------- footer ------------------------------>
        

        $pdf->SetX(10);
        $pdf->Ln(5);
        $pdf->GetY();
        $y = $pdf->GetY();
            $pdf->SetY(150);
        $pdf->SetFont('Times','',8);

        $y = $pdf->GetY();
        $pdf->Line(20,$y + 11,80,$y + 11);
        $pdf->SetY($y + 12);
        $pdf->SetX(20);
        $pdf->Cell(60, 5, "Americo Sangama", 0, 0, 'C', 0);
        $pdf->SetY($y + 16);
        $pdf->SetX(20);
        $pdf->Cell(60, 5, utf8_decode("V° B° Control de Calidad"), 0, 0, 'C', 0);

        $pdf->SetY($y + 11);
        $pdf->SetX(130);
        $pdf->Line(215,$y + 11,275,$y + 11);
        $pdf->SetY($y + 12);
        $pdf->SetX(215);
        $pdf->Cell(60, 5, "Hans Lopez", 0, 0, 'C', 0);
        $pdf->SetY($y + 16);
        $pdf->SetX(215);
        $pdf->Cell(60, 5, utf8_decode("V° B° Gestor de Compras"), 0, 0, 'C', 0);
        $pdf->SetY($y + 23);
        

        
        
        
        
        






        $contx = $contx +1;
    

$pdf->Output();