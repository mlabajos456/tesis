<?php
 $raiz = "..";
    
    require("../class/sentencias.php");
    require('pdf_listar_proveedores.php');
    require_once("../php/utilitario.php");
    $sql = new sentencias();
    session_start();
    if(!isset($_SESSION['nickname'])){
        header("Location: ./login.php");
     }
    $usuario = pg_fetch_array($sql->consulta("SELECT * from T_empleado e inner join  T_usuario u ON e.id_empleado = u.id_empleado WHERE u.nom_usuario = '".$_SESSION['nickname']."'"));
    
    $user=$usuario['nom_usuario'];//--------------------USER
    $id_usuario=$usuario['id_usuario'];//-----------------ID USER
    $formato=new utilitariophp();
    
    
    $cuenta=$_GET['cuenta'];
  if($_GET['hasta']!=null){
    $hasta=$_GET['hasta'];
  }else{
    $hasta=0;
  }
  if($_GET['desde']!=null){
    $desde=$_GET['desde'];
  }else{
    $desde=0;
  }
  $where=($cuenta=='0')? "":"where cb.id_cuenta_bancaria ='$cuenta'";
  $fechas=($desde!=0 and $hasta!=0)? "and mov.fecha between '$desde' and '$hasta'":""; 
    date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");
    $blanc="X";
    $contx = 1;
    $pdf=new PDF('L','mm','A4');
    $pdf->SetMargins(10, 20 , 0);
    $pdf->SetAutoPageBreak(true,38);
//OSTIABIENDA
    
    $detalle = $sql->consulta("SELECT cb.id_cuenta_bancaria,cb.nom_cuenta_bancaria, mov.fecha, mov.descripcion,mov.monto_salida,mov.comision,mov.itf,mov.interes,mov.monto_entrada,mov.saldo from t_tmp_movimiento mov
                    inner join t_cuenta_bancaria cb on cb.id_cuenta_bancaria=mov.id_cuenta
                    inner join T_detalle_empleado_cuenta dec on dec.id_cuenta_bancaria = cb.id_cuenta_bancaria
                    inner join T_detalle_almacen_empleado dte on dte.id_detalle_almacen_empleado = dec.id_detalle_almacen_empleado
                    inner join T_dato_laboral_empleado dl on dl.id_dato_laboral_empleado = dte.id_dato_laboral_empleado
                    inner join T_empleado em on em.id_empleado = dl.id_empleado
                    inner join T_usuario us on us.id_empleado = em.id_empleado ".$where." ".$fechas
                    ." and us.id_usuario ='$id_usuario'");
                    
        
       
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

            $pdf->cabeza("LISTA DE MOVIMIENTOS DE CUENTAS SOLES",130,10,utf8_decode(''),128);
            //$pdf->lineado('H');
       
        $font='Arial';
        $size=8;
        $pdf->SetFont('times', 'B', 12);
        $pdf->SetY(0);
       
        $pdf->SetY(18);
        $pdf->SetX(135);
        $pdf->SetTextColor(0,0,0);

        //PARTE DERECHA ------------------------------------------->

        $pdf->SetX(7);
        $pdf->SetFont('times', '', 9);
        $pdf->SetFillColor(255,255,255);
        $pdf->Ln(5);
       // $pdf->Cell(20, 10, utf8_decode('Detalle del ingreso asignado a cuentas de la empresa'), 0, 0, 'L', 1);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //Tabla coloreada
    $miCabecera = array('N',utf8_decode('Cta Bancaria'),utf8_decode('Fecha'), utf8_decode('Descripción'),utf8_decode('Salida'), utf8_decode('Comisión'), utf8_decode('Ift'), utf8_decode('Interés'), utf8_decode('Ingreso'),utf8_decode('Saldo'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',9);
        $pdf->SetX(9);
        //Cabecera
        $h=5;

        $w0=10;     //  N
        $w1=47;     //  Cta Bancaria
        $w2=23;     //  Fecha
        $w3=90;     //  Descripcion
        $w4=20;     //  Salida
        $w5=17;     //  Comision
        $w6=17;     //  Ift
        $w7=17;     //  Interes
        $w8=17;     //  Ingreso
        $w9=22;     //  Saldo

       // for ($i = 0; $i < count($miCabecera); $i++) {
             $pdf->Cell($w0, $h, $miCabecera[0], 1, 0, 'C', 1);
             $pdf->Cell($w1, $h, $miCabecera[1], 1, 0, 'C', 1);
             $pdf->Cell($w2, $h, $miCabecera[2], 1, 0, 'C', 1);
             $pdf->Cell($w3, $h, $miCabecera[3], 1, 0, 'C', 1);
             $pdf->Cell($w4, $h, $miCabecera[4], 1, 0, 'C', 1);
             $pdf->Cell($w5, $h, $miCabecera[5], 1, 0, 'C', 1);
             $pdf->Cell($w6, $h, $miCabecera[6], 1, 0, 'C', 1);
             $pdf->Cell($w7, $h, $miCabecera[7], 1, 0, 'C', 1);
             $pdf->Cell($w8, $h, $miCabecera[8], 1, 0, 'C', 1);
             $pdf->Cell($w9, $h, $miCabecera[9], 1, 0, 'C', 1);
       //  }
        $pdf->Ln();
        //Restauración de colores y fuentes
        $pdf->SetFillColor(245,245,245);
        $pdf->SetTextColor(0);
        $size = 8.0;
        $pdf->SetFont($font,'',$size);
        //Datos
        $total=0;
        $fill=false;
        $total_cantidad = 0;
        $total_pbruto = 0;
        $total_tara = 0;
        $total_pneto = 0;
        $contador = 1;
        $acumulador=0;
        $acumulador3=0;
        $acumulador5=0;
        $acumulador8=0;
        $acumulador10=0;

        while($r8 = pg_fetch_array($detalle)){

            
            $nom_cuenta_bancaria = $r8[1];
            $fecha=  $r8[2];
            $r8[3]= $r8[3]." ";
            $descripcion =utf8_decode($r8[3]);
            $monto_salida = "S/ ".$formato->formatMoney(number_format($r8[4],2,'.',''),true);
            $comision= "S/ ".$formato->formatMoney(number_format($r8[5],2,'.',''),true);
            $itf = "S/ ".$formato->formatMoney(number_format($r8[6],2,'.',''),true);
            $interes =  "S/ ".$formato->formatMoney(number_format($r8[7],2,'.',''),true);
            $monto_entrada ="S/ ".$formato->formatMoney(number_format($r8[8],2,'.',''),true);
            $saldo = "S/ ".$formato->formatMoney(number_format($r8[9],2,'.',''),true);

            $anio= substr($fecha,0,4);
            $mes= substr($fecha,5,2);
            $dia= substr($fecha,8,2);
            $fecha = $dia.'/'.$mes.'/'.$anio;
            
            $acumulador+=$r8[4];
            $acumulador3+=$r8[5];
            $acumulador5+=$r8[6];
            $acumulador8+=$r8[7];
            $acumulador10+=$r8[8];
//------------------------------------------MULTICELL---------------------

            $cellWidth=$w3;
                $cellHeight=5;
                if ($pdf->GetStringWidth($r8[3])<$cellWidth) {
                    $line=1;
                }else{
                    $textLength=strlen($r8[3]);
                    $errMargin=10;
                    $startChar=0;
                    $maxChar=0;
                    $textArray=Array();
                    $tmpString="";

                    while ($startChar < $textLength) {
                        while (
                            $pdf->GetStringWidth($tmpString)<($cellWidth-$errMargin)&&
                            ($startChar+$maxChar)<$textLength
                        ) {
                          $maxChar++;
                          $tmpString=substr($r8[3],$startChar,$maxChar);
                        }

                        $startChar=$startChar+$maxChar;
                        array_push($textArray,$tmpString);
                        $maxChar=0;
                        $tmpString='';
                    }
                    $line=count($textArray);
                }
                
            $pdf->SetX(9);
            $h=10;
            $borde=1;

                

            $pdf->Cell($w0,($line*$cellHeight),$contador,$borde,0,'C',$fill);
            $pdf->Cell($w1,($line*$cellHeight),$nom_cuenta_bancaria,$borde,0,'L',$fill);
            $pdf->Cell($w2,($line*$cellHeight),$fecha,$borde,0,'C',$fill);
            
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->MultiCell($cellWidth,$cellHeight,utf8_decode($r8[3]),$borde,'L',$fill);
                $pdf->SetXY($x+$cellWidth,$y);

            $pdf->Cell($w4,($line*$cellHeight),$monto_salida,$borde,0,'R',$fill);
            $pdf->Cell($w5,($line*$cellHeight),$comision,$borde,0,'R',$fill);
            $pdf->Cell($w6,($line*$cellHeight),$itf,$borde,0,'R',$fill);
            $pdf->Cell($w7,($line*$cellHeight),$interes,$borde,0,'R',$fill);
            $pdf->Cell($w8,($line*$cellHeight),$monto_entrada,$borde,0,'R',$fill);
            $pdf->Cell($w9,($line*$cellHeight),$saldo,$borde,0,'R',$fill);
            $pdf->Ln();

            $fill=!$fill;
            $contador = $contador + 1;
        }
        $acumulador2="S/ ".$formato->formatMoney(number_format($acumulador,2,'.',''),true);
        $acumulador4="S/ ".$formato->formatMoney(number_format($acumulador3,2,'.',''),true);
        $acumulador7="S/ ".$formato->formatMoney(number_format($acumulador5,2,'.',''),true);
        $acumulador9="S/ ".$formato->formatMoney(number_format($acumulador8,2,'.',''),true);
        $acumulador11="S/ ".$formato->formatMoney(number_format($acumulador10,2,'.',''),true);

        $y=$pdf->GetY();
        $pdf->Ln();
        $size = 8;
        $textTotal = array('TOTALES');
        $monto_salida = array($acumulador2);
        $comision = array($acumulador4);
        $itf = array($acumulador7);
        $interes = array($acumulador9);
        $monto_entrada = array($acumulador11);

        $pdf->cabeceraVertical($textTotal,9,$y,$w0 + $w1 + $w2+ $w3,5,$font,'B',$size,'R');
        $pdf->datosVerticales($monto_salida,9+ $w0 + $w1 + $w2+ $w3 ,$y,$w4,5,$font,'B',$size,'R');
        $pdf->datosVerticales($comision,99+ $w0 + $w1 + $w2+ $w4 ,$y,$w5,5,$font,'B',$size,'R');
        $pdf->datosVerticales($itf,116+ $w0 + $w1 + $w2+ $w4 ,$y,$w5,5,$font,'B',$size,'R');
        $pdf->datosVerticales($interes,133+ $w0 + $w1 + $w2+ $w4 ,$y,$w5,5,$font,'B',$size,'R');
        $pdf->datosVerticales($monto_entrada,150+ $w0 + $w1 + $w2+ $w4 ,$y,$w5,5,$font,'B',$size,'R');
        //---------- footer ------------------------------>
        

        $pdf->SetX(10);
        $pdf->Ln(5);
        $pdf->GetY();
        $y = $pdf->GetY();
            $pdf->SetY(150);
        $pdf->SetFont('Times','',8);

        $y = $pdf->GetY();
        

$pdf->Output();