<?php
   session_start();
   $raiz = "../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   require($raiz."class/utilitario.php");
   $formato=new utilitariophp();
   //$id_carrera=57;//$_GET['codigo'];
    
    date_default_timezone_set("America/Lima");

    $linea


    date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");
    $blanc="X";

    $fecha_orden=$fecha_salida;
    $anio= substr($fecha_orden,0,4);
    $mes= substr($fecha_orden,5,2);
    $dia= substr($fecha_orden,8,2);


       $pdf=new PDF('L','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->cabeza("RUC 20450359484",125,20,utf8_decode('Usuario: '));
        $pdf->lineado('H');
        /*********************************************************************/

        $pdf->SetTextColor(0,0,0);

        $font='Arial';
        $size=7;
        $pdf->SetFont($font, 'B', 12);
        $pdf->SetY(0);
        $miCabecera = array('CONDUCTOR','DIRECCIÓN');
		$misDatos = array($cond,$direccion);

        $miCabecera2 = array('CIUDAD','LICENCIA');
        $misDatos2 = array($nom_ciudad,$licencia_conductor);
		

        $miCabecera3 = array('RUTA');
        $misDatos3 = array($nom_ruta);

        $miCabecera4 = array(' SALIDA');
        $misDatos4 = array($fecha_salida.'   '.$hora);

        $miCabecera5 = array(' LLEGADA ');
        $misDatos5 = array($fecha_llegada.'    '.$hora_llegada);

        $miCabecera6 = array('AÑO ','MES','DÍA');
        $misDatos6 = array($anio,$mes,$dia);

        $miCabecera7 = array('OBSERVACIONES ','PROVEEDOR ACEPTA CONDICIONES','COMPRADOR');
        $misDatos7 = array('','------------------------','-----------------------');

        $miCabecera8 = array('SUBTOTAL ','DESCUENTO','I.G.V','SEGURO Y/O FLETE','TOTAL ORDEN');
        $misDatos8 = array('0.00','0.00','0.00','0.00',' ', 2, '.','');

        $miCabecera10 = array('DNI ','NACIMIENTO');
        $misDatos10 = array($dni_conductor,$fecha_nacimiento);
		//$pdf->cabeceraVertical($miCabecera,20,50);
		//$pdf->datosVerticales($misDatos,70,50);

        $pdf->SetY(100);
        $pdf->SetX(135);
        $pdf->SetTextColor(0,0,0);

        $pdf->SetFont('times','', 6);
        $pdf->SetY(25);
        $pdf->SetX(10);
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(10, 10, utf8_decode('Datos Proporcionados por el conductor'), 0, 0, 'L', 1);
        $pdf->Ln(0);
        $pdf->SetFillColor(232,232,232); 
        //************CABECERA DEDOCUMENTO*****
        $pdf->cabeceraVertical($miCabecera,10,35,20,6,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos,30,35,90,6,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera2,10,47,20,6,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos2,30,47,35,6,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera10,65,47,20,6,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos10,85,47,35,6,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera3,130,35,50,12,$font,'B',10,'C');
        $pdf->datosVerticales($misDatos3,180,35,40,12,$font,'B',7,'C');

        $pdf->cabeceraVertical($miCabecera4,130,53,30,6,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos4,160,53,45,6,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera5,205,53,30,6,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos5,235,53,45,6,$font,'',$size,'L');

        $pdf->cabeceraHorizontal($miCabecera6,220,35,20,6,$font,'B',9,'C');
        $pdf->datosHorizontal($misDatos6,220,41,20,6,$font,'',9,'C');

        //***************/////<fin cabecera>
        $pdf->Ln(10);
        $pdf->SetX(10);
        $pdf->SetY(60);
        $pdf->SetFont('times', '', 9);
        $pdf->SetFillColor(255,255,255);
       // $pdf->Cell(20, 10, utf8_decode('Detalle del ingreso asignado a cuentas de la empresa'), 0, 0, 'L', 1);
        $pdf->Ln(15);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //Tabla coloreada
        $miCabecera = array( 'DNI','NOMBRE ','FECHA NACIMIENTO');
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',$size);
        $pdf->SetX(10);
        //Cabecera
        $h=10;

        $w1=60;
        $w2=150;
        $w3=60;
        $w4=15;
        $w5=55;
        $w6=20;
        $w7=20;
        $w8=15;
        $w9=10;
        $w10=10;
        $w11=15;
       // for ($i = 0; $i < count($miCabecera); $i++) {
             $pdf->Cell($w1, $h, $miCabecera[0], 1, 0, 'C', 1);
             $pdf->Cell($w2, $h, $miCabecera[1], 1, 0, 'C', 1);
             $pdf->Cell($w3, $h, $miCabecera[2], 1, 0, 'C', 1);
            
       //  }
        $pdf->Ln();
        //Restauración de colores y fuentes
        $pdf->SetFillColor(245,245,245);
        $pdf->SetTextColor(0);
        $pdf->SetFont($font,'',7);
        //Datos
        $total=0;
        $fill=false;
             $stmt = Conexion::conectar()->prepare("SELECT p.dni_pasajero,p.nombre_pasajero,p.fecha_nacimiento from t_pasajero p inner join t_detalle_carrera_pasajero dcp on p.id_pasajero=dcp.id_pasajero inner join t_carrera c on c.id_carrera=dcp.id_carrera where c.id_carrera='$id_carrera'");
                            $stmt->execute();
                            foreach ($stmt->fetchAll() as $r) {
            $anio= substr('',0,4);
            $mes= substr('',5,2);
            $dia= substr('',8,2);
            $dni = $r[0];
            $nombre =$r[1];
            $fecha_nacimiento = $r[2];
           
//------------------------------------------MULTICELL---------------------
           
             $pdf->Cell(60, $h,$dni, 1, 0, 'C', 1);
             $pdf->Cell(150, $h, $nombre, 1, 0, 'L', 1);
              $pdf->Cell(60, $h, $fecha_nacimiento, 1, 0, 'C', 1);
               
        
                $pdf->Ln();
                $fill=!$fill;
            

//---------------------------------------------------------------            
           // $total+=$monto;
            $pdf->SetX(10);
            $h=8;
            
            /*
            $pdf->Cell($w1,$h,$id,$borde,0,'C',$fill);
            $pdf->Cell($w2,$h,$cod_prod,$borde,0,'C',$fill);
            //$pdf->Write($h,utf8_decode($des),$borde,0,'C',$fill);
            $pdf->Cell($w3,$h,utf8_decode($des),$borde,0,'C',$fill);
            $pdf->Cell($w4,$h,utf8_decode($u_med),$borde,0,'C',$fill);
            $pdf->Cell($w5,$h,$entrega,$borde,0,'C',$fill);
            $pdf->Cell($w6,$h,$cant,$borde,0,'C',$fill);
            $pdf->Cell($w7,$h,$fecha,$borde,0,'C',$fill);
            $pdf->Cell($w8,$h,number_format($p_unit, 2, '.', ''),$borde,0,'C',$fill);
            $pdf->Cell($w9,$h,number_format($descuento, 2, '.', ''),$borde,0,'C',$fill);
            $pdf->Cell($w10,$h,number_format($igv, 2, '.', ''),$borde,0,'C',$fill);
            $pdf->Cell($w11,$h,number_format($totalb, 2, '.', ''),$borde,0,'C',$fill);
            $pdf->Ln();
            $fill=!$fill;*/
       }

        $fill=true;
        $pdf->SetX(10);
        //$pdf->Cell(270,0,'','T');
        $pdf->Ln(3);
        $y=$pdf->GetY();
        
        
        $misDatos9 = array('CONDICIONES DE VIAJE');
        $pdf->datosVerticales($misDatos9,10,163,180,7,$font,'B',8,'C');
        
        $pdf->Output();