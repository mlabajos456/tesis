<?php
 $raiz = "..";
    
    require("../class/sentencias.php");
    require('pdf_listar_registro_cuentasBancarias.php');
    require_once("../php/utilitario.php");
    $formato=new utilitariophp();
    $sql = new sentencias();

    date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");
    $blanc="X";
    $contx = 1;
    $pdf=new PDF('L','mm','A4');
    $pdf->SetMargins(10, 20 , 0);
    $pdf->SetAutoPageBreak(true,38);
//OSTIABIENDA
    
    $detalle = $sql->consulta("SELECT tcb.id_cuenta_bancaria,tcb.num_cuenta_bancaria,tcb.nom_cuenta_bancaria,tb.nom_banco,
                tc.nom_tipo_cuenta_bancaria,tcb.saldo_cuenta_bancaria,m.nom_moneda,
                tcb.fecha_registro FROM T_cuenta_bancaria tcb 
             inner join T_banco tb on tb.id_banco= tcb.id_banco
             inner join T_tipo_cuenta tc on tc.id_tipo_cuenta_bancaria = tcb.id_tipo_cuenta_bancaria
             inner join T_moneda m on m.id_moneda = tcb.id_moneda
             order by tcb.fecha_registro asc");
        
       
        $pdf->AliasNbPages();
        $pdf->AddPage();

        
        /*********************************************************************/

        $pdf->SetFont('times', '', 10);

        $pdf->SetFont('Times','',8);
            $pdf->SetY(10);

            $pdf->cabeza("LISTA DE REGISTRO DE CUENTAS BANCARIAS",125,12,utf8_decode(''),128);
            //$pdf->lineado('H');

        $font='Arial';
        $size=8;
        $pdf->SetFont('times', 'B', 12);
        $pdf->SetY(0);
       
        $pdf->SetY(18);
        $pdf->SetX(135);
        $pdf->SetTextColor(0,0,0);

        //PARTE DERECHA ------------------------------------------->

        $pdf->SetX(20);
        $pdf->SetFont('times', '', 9);
        $pdf->SetFillColor(255,255,255);
        $pdf->Ln(5);
       // $pdf->Cell(20, 10, utf8_decode('Detalle del ingreso asignado a cuentas de la empresa'), 0, 0, 'L', 1);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //Tabla coloreada
    $miCabecera = array('N',utf8_decode('N°Cta'),utf8_decode('Descripcion'), utf8_decode('Banco'),utf8_decode('Tipo Cuenta'), utf8_decode('Saldo'), utf8_decode('Moneda'),utf8_decode('Fecha Registro'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',8);
        $pdf->SetX(15);
        //Cabecera
        $h=5;

        $w0=10;     //  N
        $w1=33;     //  N°Cta
        $w2=80;     //  Descripcion
        $w3=65;     //  Banco
        $w4=25;     //  Tipo Cuenta
        $w5=20;     //  Saldo
        $w6=15;     //  Moneda
        $w7=22;     //  Fecha Registro
        

       // for ($i = 0; $i < count($miCabecera); $i++) {
             $pdf->Cell($w0, $h, $miCabecera[0], 1, 0, 'C', 1);
             $pdf->Cell($w1, $h, $miCabecera[1], 1, 0, 'C', 1);
             $pdf->Cell($w2, $h, $miCabecera[2], 1, 0, 'C', 1);
             $pdf->Cell($w3, $h, $miCabecera[3], 1, 0, 'C', 1);
             $pdf->Cell($w4, $h, $miCabecera[4], 1, 0, 'C', 1);
             $pdf->Cell($w5, $h, $miCabecera[5], 1, 0, 'C', 1);
             $pdf->Cell($w6, $h, $miCabecera[6], 1, 0, 'C', 1);
             $pdf->Cell($w7, $h, $miCabecera[7], 1, 0, 'C', 1);
            
             
       //  }
        $pdf->Ln();
        //Restauración de colores y fuentes
        $pdf->SetFillColor(245,245,245);
        $pdf->SetTextColor(0);
        $size = 7.0;
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

            
            $num_cuenta_bancaria = $r8[1];
            $nom_cuenta_bancaria=  $r8[2];
            $nom_banco = $r8[3];
            $nom_tipo_cuenta_bancaria =  $r8[4];
            $saldo_cuenta_bancaria = $formato->formatMoney(number_format($r8[5],2,'.',''),true);
            $nom_moneda= $r8[6];
            $fecha_registro =  $r8[7];

            $anio= substr($fecha_registro,0,4);
            $mes= substr($fecha_registro,5,2);
            $dia= substr($fecha_registro,8,2);
            
            $fecha_registro = $dia.'/'.$mes.'/'.$anio;           
           
            $pdf->SetX(15);
            $h=5;
            $borde=1;

            $pdf->Cell($w0,$h,$contador,$borde,0,'C',$fill);
           
            $pdf->Cell($w1,$h,$num_cuenta_bancaria,$borde,0,'L',$fill);
            $pdf->Cell($w2,$h,$nom_cuenta_bancaria,$borde,0,'L',$fill);
            $pdf->Cell($w3,$h,$nom_banco,$borde,0,'L',$fill);
            $pdf->Cell($w4,$h,$nom_tipo_cuenta_bancaria,$borde,0,'C',$fill);
            $pdf->Cell($w5,$h,$saldo_cuenta_bancaria,$borde,0,'R',$fill);
            $pdf->Cell($w6,$h,$nom_moneda,$borde,0,'C',$fill);
            $pdf->Cell($w7,$h,$fecha_registro,$borde,0,'C',$fill);
           
            $pdf->Ln();

            $fill=!$fill;
            $contador = $contador + 1;
        }
        $y=$pdf->GetY();
        $pdf->Ln();
        $size = 8;


        //---------- footer ------------------------------>
        

        $pdf->SetX(10);
        $pdf->Ln(5);
        $pdf->GetY();
        $y = $pdf->GetY();
            $pdf->SetY(150);
        $pdf->SetFont('Times','',8);

        $y = $pdf->GetY();
        

$pdf->Output();