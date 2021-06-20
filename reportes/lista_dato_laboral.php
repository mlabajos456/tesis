<?php

    
    $raiz = "../docs/";
    require($raiz."class/sentencias.php");
    require($raiz."class/utilitario.php");
    require('pdf_lista_dato_laboral.php');
   
    $sql = new sentencias();
    
   
    $formato=new utilitariophp();
    
 date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");
    $time1= date('H:i:s', time());
    $time2= date('d/m/Y, H:i:s', time());
    $blanc="X";
    $contx = 1;
    $pdf=new PDF('L','mm','A4');
    $pdf->SetMargins(10, 20 , 0);
    $pdf->SetAutoPageBreak(true,38);
//OSTIABIENDA
    $id_regimen_laboral=$_GET['id_regimen_laboral'];
    $id_categoria_ocupacional=$_GET['id_categoria_ocupacional'];
    $id_condicion_laboral=$_GET['id_condicion_laboral'];
    $id_meta=$_GET['id_meta'];
    $id_periodo=$_GET['id_periodo'];
    $filtro1 = ($id_regimen_laboral!=0) ?"where rl.id_regimen_laboral='$id_regimen_laboral'":'where rl.id_regimen_laboral<>0';
    $filtro2 = ($id_categoria_ocupacional!=0) ?" and co.id_categoria_ocupacional='$id_categoria_ocupacional'":'and co.id_categoria_ocupacional<>0';
    $filtro3 = ($id_condicion_laboral!=0) ?" and cl.id_condicion_laboral='$id_condicion_laboral'":'and cl.id_condicion_laboral<>0';
    $filtro4 = ($id_meta!=0) ?" and m.id_meta='$id_meta'":' and m.id_meta<>0';
    $filtro5 = ($id_periodo!=0) ?" and p.id_periodo='$id_periodo'":' and p.id_periodo<>0';
    $sql_filtro=$filtro1.$filtro2.$filtro3.$filtro4.$filtro5;


    $detalle = $sql->consulta("SELECT e.id_empleado,e.nom_empleado,e.dni_empleado,e.img_empleado,e.direccion,dl.total_bruto,dl.total_descuento,dl.total_neto,co.nom_categoria_ocupacional,cl.nom_condicion_laboral,rl.nom_regimen_laboral,pp.fecha_periodo_pago ,rp.nom_regimen_pensionario,dl.fecha_ingreso,dl.estado,dl.id_dato_laboral,e.ape_materno,e.ape_paterno,m.nom_meta from t_empleado e 
      inner join t_dato_laboral dl on dl.id_empleado=e.id_empleado
      inner join t_categoria_ocupacional co on co.id_categoria_ocupacional=dl.id_categoria_ocupacional
      inner join t_condicion_laboral cl on cl.id_condicion_laboral = dl.id_condicion_laboral
      inner join t_regimen_laboral rl on rl.id_regimen_laboral=dl.id_regimen_laboral
      inner join t_meta m on m.id_meta=dl.id_meta
      inner join t_perido_pago_ pp on pp.id_dato_laboral=dl.id_dato_laboral
      inner join t_periodo p on p.id_periodo=pp.id_periodo
      inner join t_regimen_pensionario rp on rp.id_regimen_pensionario=dl.id_regimen_pensionario ".$sql_filtro);
      

       
        $pdf->AliasNbPages();
        $pdf->AddPage();

        
        /*********************************************************************/

        $pdf->SetTextColor(0,0,0);
        

        $pdf->SetFont('times', '', 10);
        $pdf->SetY(6);
        
        $pdf->SetX(245);
    
        $pdf->Ln();
        $pdf->SetX(245);
  
    $dato= $sql->consulta("SELECT * FROM t_periodo where id_periodo='$id_periodo'");
    while($r1 = pg_fetch_array($dato)){
           $fechaa=$r1['mes'].' '.$r1['ano_periodo'];
          
                  


}

        $pdf->SetFont('Times','',8);
            $pdf->SetY(10);

            $pdf->cabeza("LISTA DE DATOS LABORALES PERIODO: $fechaa ",125,12,utf8_decode(''),128);
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
    $miCabecera = array(utf8_decode('RUC/DNI'),utf8_decode('Apellidos y Nombres'),utf8_decode('META'),utf8_decode('Bruto'), utf8_decode('Desc'),utf8_decode('Neto'), utf8_decode('Reg. Laboral'),utf8_decode('Cat. Ocupacional'),utf8_decode('Cond. Laboral'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',9);
        $pdf->SetX(9);
        //Cabecera
        $h=5;

        $w0=22;     //  RUC
        $w1=60;     //  NOMBRES
        $w2=25;     //  META
        $w3=18;     //  BRUTO
        $w4=18;     //  DESCUENTOS
        $w5=18;     //  BETO
        $w6=70;     //  Reg Laboral
        $w7=27;     //  cat ocupacional
        $w8=25;     //  cond laboral

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
            
          
       //  }
        $pdf->Ln();
        //Restauración de colores y fuentes
        $pdf->SetFillColor(255,255,255);
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
        $cont=0;
        while($r = pg_fetch_array($detalle)){

       
               $bruto=$sql->consulta("SELECT SUM(d.monto_remuneracion_periodo) from t_detalle_remuneracion_periodo d 
                   inner join t_perido_pago_ pp on pp.id_periodo_pago=d.id_periodo_pago
                   inner join t_dato_laboral dl on dl.id_dato_laboral=pp.id_dato_laboral
                   where dl.id_dato_laboral=".$r['id_dato_laboral']);
                   //and pp.id_periodo_pago=
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
                   $fechai=$r['fecha_ingreso'];
                   $anio= substr($fechai,0,4);
                   $mes= substr($fechai,5,2);
                   $dia= substr($fechai,8,2);
                   $fechai=$dia."/".$mes."/".$anio;
                   $estado = ($r['estado']==1) ?'checked=""':'';
              
                   $cont++;

                           
                              $nombres=$r['ape_paterno'].' '.$r['ape_materno'].' '.$r['nom_empleado'];
                              $nom_empleado=$r['nom_empleado'];
                              $direccion=$r['direccion'];
                              $ape_materno=$r['ape_materno'];
                              $nom_meta=$r['nom_meta'];
                              $nom_categoria_ocupacional=$r['nom_categoria_ocupacional'];
                              $nom_condicion_laboral=$r['nom_condicion_laboral'];
                              $nom_regimen_laboral=$r['nom_regimen_laboral'];
                              $nom_regimen_pensionario=$r['nom_regimen_pensionario'];
                  
                              $ape_paterno=$r['ape_paterno'];
                              $dni_empleado=$r['dni_empleado'];
                              $img_empleado=$r['img_empleado'];
                              
                          
                            

                             
                              
           

           
            
        
//------------------------------------------MULTICELL---------------------

                $cellWidth=$w1;
                $cellHeight=5;
                if ($pdf->GetStringWidth($nombres)<$cellWidth) {
                    $line=1;
                }else{
                    $textLength=strlen($nombres);
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
                          $tmpString=substr($nombres,$startChar,$maxChar);
                        }

                        $startChar=$startChar+$maxChar;
                        array_push($textArray,$tmpString);
                        $maxChar=0;
                        $tmpString='';
                    }
                    $line=count($textArray);
                }
                
                //------------------------------------------MULTICELL---------------------

                $cellWidth1=$w6;
                $cellHeight1=5;
                if ($pdf->GetStringWidth($nom_regimen_laboral)<$cellWidth1) {
                    $line2=1;
                }else{
                    $textLength1=strlen($nom_regimen_laboral);
                    $errMargin1=10;
                    $startChar1=0;
                    $maxChar1=0;
                    $textArray1=Array();
                    $tmpString1="";

                    while ($startChar1 < $textLength1) {
                        while (
                            $pdf->GetStringWidth($tmpString1)<($cellWidth1-$errMargin1)&&
                            ($startChar1+$maxChar1)<$textLength1
                        ) {
                          $maxChar1++;
                          $tmpString1=substr($nom_regimen_laboral,$startChar1,$maxChar1);
                        }

                        $startChar1=$startChar1+$maxChar1;
                        array_push($textArray1,$tmpString1);
                        $maxChar1=0;
                        $tmpString1='';
                    }
                    $line2=count($textArray1);
                }

                //------------------------------------------MULTICELL---------------------

                $cellWidth2=$w8;
                $cellHeight=5;
                if ($pdf->GetStringWidth($direccion)<$cellWidth2) {
                    $line3=1;
                }else{
                    $textLength2=strlen($direccion);
                    $errMargin2=10;
                    $startChar2=0;
                    $maxChar2=0;
                    $textArray2=Array();
                    $tmpString2="";

                    while ($startChar2 < $textLength2) {
                        while (
                            $pdf->GetStringWidth($tmpString2)<($cellWidth2-$errMargin2)&&
                            ($startChar2+$maxChar2)<$textLength2
                        ) {
                          $maxChar2++;
                          $tmpString2=substr($email,$startChar2,$maxChar2);
                        }

                        $startChar2=$startChar2+$maxChar2;
                        array_push($textArray2,$tmpString2);
                        $maxChar2=0;
                        $tmpString2='';
                    }
                    $line3=count($textArray2);
                }

        

            $pdf->SetX(9);
            $h=10;
            $borde=1;

            

            $pdf->Cell($w0,($line*$cellHeight),$dni_empleado,$borde,0,'C',$fill);
            
            
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->MultiCell($cellWidth,$cellHeight,utf8_decode($nombres),$borde,'L',$fill);
                $pdf->SetXY($x+$cellWidth,$y);

            $pdf->Cell($w2,($line*$cellHeight),$nom_meta,$borde,0,'L',$fill);
            $pdf->Cell($w3,($line*$cellHeight),$t_bruto,$borde,0,'C',$fill);
            $pdf->Cell($w4,($line*$cellHeight),$t_desc,$borde,0,'R',$fill);
            $pdf->Cell($w5,($line*$cellHeight),$t_neto,$borde,0,'R',$fill);    
            $pdf->Cell($w6,($line*$cellHeight),$nom_regimen_laboral,$borde,0,'R',$fill);    
            $pdf->Cell($w7,($line*$cellHeight),$nom_categoria_ocupacional,$borde,0,'R',$fill);
            $pdf->Cell($w8,($line*$cellHeight),$nom_condicion_laboral,$borde,0,'R',$fill);


            
            $pdf->Ln();

            $fill=!$fill;
            $contador = $contador + 1;
        }
      

        $y=$pdf->GetY();
        $pdf->Ln();
        $size = 8;
        $textTotal = array('TOTALES');
    

        

        $pdf->SetX(10);
        $pdf->Ln(5);
        $pdf->GetY();
        $y = $pdf->GetY();
            $pdf->SetY(150);
        $pdf->SetFont('Times','',8);

        $y = $pdf->GetY();
        

$pdf->Output();