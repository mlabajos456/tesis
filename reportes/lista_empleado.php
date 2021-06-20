<?php

    
    $raiz = "../docs/";
    require($raiz."class/sentencias.php");
    require($raiz."class/utilitario.php");
    require('pdf_lista_empleado.php');
   
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
    
    $detalle = $sql->consulta("SELECT * from t_empleado order by nro_empleado asc");
                    
        
       
        $pdf->AliasNbPages();
        $pdf->AddPage();

        
        /*********************************************************************/

        $pdf->SetTextColor(0,0,0);
        

        $pdf->SetFont('times', '', 10);
        $pdf->SetY(6);
        
        $pdf->SetX(245);
    
        $pdf->Ln();
        $pdf->SetX(245);
  
        $pdf->SetFont('Times','',8);
            $pdf->SetY(10);

            $pdf->cabeza("LISTA DE EMPLEADOS",150,10,utf8_decode(''),128);
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
    $miCabecera = array('N',utf8_decode('RUC/DNI'),utf8_decode('Apellidos y Nombres'),utf8_decode('Fecha'),utf8_decode('Telefono'), utf8_decode('Cargo'),utf8_decode('Nro Cuenta') , utf8_decode('Nro Cus'),utf8_decode('Email'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',9);
        $pdf->SetX(9);
        //Cabecera
        $h=5;

        $w0=10;     //  N
        $w1=22;     //  Dni
        $w2=70;     //  Nombre
        $w3=20;     //  fecha
        $w4=18;     //  telefono
        $w5=40;     //  Cargo
        $w6=25;     //  nro cuenta
        $w7=25;     //  nro cus
        $w8=50;     //  Email

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

        while($r = pg_fetch_array($detalle)){

       


                              $fecha=$r['fecha_nacimiento'];
                              $nro_empleado=$r['nro_empleado'];
                              $nombres=$r['ape_paterno'].' '.$r['ape_materno'].' '.$r['nom_empleado'];
                              $nom_empleado=$r['nom_empleado'];
                              $direccion=$r['direccion'];
                              $ape_materno=$r['ape_materno'];
                              $sexo=($r['sexo']==1)?'Masculino':'Femenino';
                              $num_telefono=$r['num_telefono'];
                             
                              $nro_cus=$r['nro_cus'];
                              $nro_cuenta=$r['nro_cuenta'];
                              $cargo=$r['cargo'];
                              $ape_paterno=$r['ape_paterno'];
                              $dni_empleado=$r['dni_empleado'];
                              $img_empleado=$r['img_empleado'];
                              $num_hijos=$r['num_hijos'];
                              $estado_civil=$r['estado_civil'];
                              $e_c="";
                             if($estado_civil==0){
                                $estado_civil="Sin Especifiar";
                             }else{
                                  if($estado_civil==1){
                                $estado_civil="SOLTERO";
                            }
                                  if($estado_civil==2){
                                $estado_civil="CASADO";
                            }
                                  if($estado_civil==3){
                                $estado_civil="DIVORCIADO";
                             }
                         }

                              $email=$r['email'];
                              $contacto=$r['contacto'];
                              $num_contacto=$r['num_contacto'];
                              $anio= substr($fecha,0,4);
                              $mes= substr($fecha,5,2);
                              $dia= substr($fecha,8,2);
                              $fecha=$dia."/".$mes."/".$anio;
           

           
            
        
//------------------------------------------MULTICELL---------------------

                $cellWidth=$w2;
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

                $cellWidth1=$w5;
                $cellHeight1=5;
                if ($pdf->GetStringWidth($cargo)<$cellWidth1) {
                    $line2=1;
                }else{
                    $textLength1=strlen($cargo);
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
                          $tmpString1=substr($cargo,$startChar1,$maxChar1);
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
                if ($pdf->GetStringWidth($email)<$cellWidth2) {
                    $line3=1;
                }else{
                    $textLength2=strlen($email);
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

            

            $pdf->Cell($w0,($line*$cellHeight),$nro_empleado,$borde,0,'C',$fill);
            $pdf->Cell($w1,($line*$cellHeight),$dni_empleado,$borde,0,'L',$fill);
            
            
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->MultiCell($cellWidth,$cellHeight,utf8_decode($nombres),$borde,'L',$fill);
                $pdf->SetXY($x+$cellWidth,$y);

            $pdf->Cell($w3,($line*$cellHeight),$fecha,$borde,0,'C',$fill);
            $pdf->Cell($w4,($line*$cellHeight),$num_telefono,$borde,0,'R',$fill);
                
                $x1=$pdf->GetX();
                $y1=$pdf->GetY();
                $pdf->MultiCell($cellWidth1,$cellHeight1,utf8_decode($cargo),$borde,'L',$fill);
                $pdf->SetXY($x1+$cellWidth1,$y1);
         
            $pdf->Cell($w6,($line*$cellHeight),$nro_cuenta,$borde,0,'R',$fill);
            $pdf->Cell($w7,($line*$cellHeight),$nro_cus,$borde,0,'R',$fill);


            $pdf->Cell($w8,($line*$cellHeight),$email,$borde,0,'R',$fill);
              
            
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