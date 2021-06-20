<?php

    require('../fpdf/fpdf.php');
   
    date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");

   class PDF extends FPDF
	{
       

		 function Header()
		{
         //  $id=$_GET['codigo'];
            date_default_timezone_set('America/Lima');
            $hoy = date("F j, Y, g:i a");
            $this->SetFillColor(255,255,255);
            $this->Rect(0,0, 220, 50, 'F');
            //$this->Cell(0,10, 'Comprobante de Pago' ,0,0,'L' );
            $this->SetY(5);
            $this->SetX(70);
            $this->SetFont('Arial', 'I', 13);
            $this->SetTextColor(0,0,0);
            
            //$this->Write(5, utf8_decode($title));
            $this->SetY(15);
            $this->SetX(70);
            $this->SetFont('Arial', 'B', 13);
            //$this->Write(5, 'Test Vocacional');
            
            $this->SetY(35);
            $this->SetX(65);
            $this->SetFont('Arial', 'I', 10);
            //$this->Write(5, 'Av. Siempre Viva #123-Tarapoto ');
            $this->Image('../logo.png',10,10,28,15 );
            $this->SetFont('Arial','I',10);
            $this->SetY(0);
            $this->SetFont('Times','',8);
            $this->SetY(10);
            $this->Cell(0,10, 'Emitido: '.$hoy ,0,0,'R' );
            
         
		}
        function lineado($horientacion){
            if($horientacion == 'V'){
                $this->Line(20,40,190,40);
                $this->Line(20,269,190,269);
            }else{
                //$this->Line(20,35,277,35);
                //$this->Line(20,183,277,183);
            }

        }


        function cabeza($titulo,$x,$y,$reg){

           // $this->Cell(0,10, 'Fuente: IA Test Vocacional 2018' ,0,0,'R' );
            $this->SetY($y);
            $this->SetX($x);
            $this->SetFont('Helvetica', 'B', 12);
            $this->Write(5,utf8_decode($titulo));
            $this->SetFont('Arial','I',8);
            $this->SetY(20);
            $this->Cell(0,10, $reg,0,0,'R' );

            $this->Cell(30);
            $this->Ln(30);

        }

       function drawTextBox($strText, $w, $h, $align='L', $valign='T', $border=true)
        {
            $xi=$this->GetX();
            $yi=$this->GetY();

            $hrow=$this->FontSize;
            $textrows=$this->drawRows($w,$hrow,$strText,0,$align,0,0,0);
            $maxrows=floor($h/$this->FontSize);
            $rows=min($textrows,$maxrows);

            $dy=0;
            if (strtoupper($valign)=='M')
                $dy=($h-$rows*$this->FontSize)/2;
            if (strtoupper($valign)=='B')
                $dy=$h-$rows*$this->FontSize;

            $this->SetY($yi+$dy);
            $this->SetX($xi);

            $this->drawRows($w,$hrow,$strText,0,$align,false,$rows,1);

            if ($border)
                $this->Rect($xi,$yi,$w,$h);
        }

       function drawRows($w, $h, $txt, $border=0, $align='J', $fill=false, $maxline=0, $prn=0)
            {
                $cw=&$this->CurrentFont['cw'];
                if($w==0)
                    $w=$this->w-$this->rMargin-$this->x;
                $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
                $s=str_replace("\r",'',$txt);
                $nb=strlen($s);
                if($nb>0 && $s[$nb-1]=="\n")
                    $nb--;
                $b=0;
                if($border)
                {
                    if($border==1)
                    {
                        $border='LTRB';
                        $b='LRT';
                        $b2='LR';
                    }
                    else
                    {
                        $b2='';
                        if(is_int(strpos($border,'L')))
                            $b2.='L';
                        if(is_int(strpos($border,'R')))
                            $b2.='R';
                        $b=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
                    }
                }
                $sep=-1;
                $i=0;
                $j=0;
                $l=0;
                $ns=0;
                $nl=1;
                while($i<$nb)
                {
                    //Get next character
                    $c=$s[$i];
                    if($c=="\n")
                    {
                        //Explicit line break
                        if($this->ws>0)
                        {
                            $this->ws=0;
                            if ($prn==1) $this->_out('0 Tw');
                        }
                        if ($prn==1) {
                            $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                        }
                        $i++;
                        $sep=-1;
                        $j=$i;
                        $l=0;
                        $ns=0;
                        $nl++;
                        if($border && $nl==2)
                            $b=$b2;
                        if ( $maxline && $nl > $maxline )
                            return substr($s,$i);
                        continue;
                    }
                    if($c==' ')
                    {
                        $sep=$i;
                        $ls=$l;
                        $ns++;
                    }
                    $l+=$cw[$c];
                    if($l>$wmax)
                    {
                        //Automatic line break
                        if($sep==-1)
                        {
                            if($i==$j)
                                $i++;
                            if($this->ws>0)
                            {
                                $this->ws=0;
                                if ($prn==1) $this->_out('0 Tw');
                            }
                            if ($prn==1) {
                                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                            }
                        }
                        else
                        {
                            if($align=='J')
                            {
                                $this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                                if ($prn==1) $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                            }
                            if ($prn==1){
                                $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                            }
                            $i=$sep+1;
                        }
                        $sep=-1;
                        $j=$i;
                        $l=0;
                        $ns=0;
                        $nl++;
                        if($border && $nl==2)
                            $b=$b2;
                        if ( $maxline && $nl > $maxline )
                            return substr($s,$i);
                    }
                    else
                        $i++;
                }
                //Last chunk
                if($this->ws>0)
                {
                    $this->ws=0;
                    if ($prn==1) $this->_out('0 Tw');
                }
                if($border && is_int(strpos($border,'B')))
                    $b.='B';
                if ($prn==1) {
                    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                }
                $this->x=$this->lMargin;
                return $nl;
            }


		function Footer()
		{


        $texto="1. Punto 1 La emperesa Villabellavista SAC no se responsabiliza de las lesiones que pueden sufrir los pasajeros durante el viaje\n2. Punto 2 somos una empresa líder en transporte terrestre y siempre estamos en constante mejora\n3. Punto este docimento es un reporte de viaje que contiene información de los pasajeros a bordo y los conductores\n4.Punto este documento no tiene validez legal \n5. 5\n6. 6 \n7.
        ";
        $this->SetY(170);
        $this->SetX(10);
        $this->SetFont('Times','',8);
        $this->drawTextBox(utf8_decode($texto),270,25, 'L', 'M');
        $this->Ln(3);
        $this->SetX(10);
        $this->SetFont('Arial','B',8);
        $this->drawTextBox(utf8_decode('R.U.C. 20450359484 OFICINA PRINCIPAL AV. VIA DE EVITAMIENTO CDRA 27 - TARAPOTO - SAN MARTIN - PERU'),270,7, 'C', 'M');
            /*
            $textoPie1='Av.Vía de Evitamiento Cdra. 27-La Banda de Shilcayo-San Martín-Perú';
            $textoPie2='Cel. +51-997034994 Correo: wdelgado@cacaoelrey.com';
            $textoPie3='www.cacaoelrey.com';
            date_default_timezone_set('America/Lima');
            $hoy = date("F j, Y, g:i a");
			$this->SetFillColor(255,255,255);
            $this->Rect(0, 270, 220, 50, 'F');   
            $this->SetY(-30);
            $this->SetFont('Arial', 'I', 8);
            $this->SetTextColor(211, 84, 0);
            $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
            $this->Ln(5);
            $this->Cell(0,10,utf8_decode($textoPie1),0,0,'C' );
            $this->Ln(5);
            $this->Cell(0,10,utf8_decode($textoPie2),0,0,'C' );
            $this->Ln(5);
            $this->Cell(0,10,utf8_decode($textoPie3),0,0,'C' );*/
            
		}

     function cabeceraVertical($cabecera,$x,$y,$w,$h,$font,$style,$size,$align)
    {
        $this->SetXY($x,$y); 
        $this->SetFillColor(232,232,232); 
        $this->SetFont($font,$style,$size); // 20 50
        foreach($cabecera as $columna)
        {
            //Parámetro con valor 2, hace que la cabecera sea vertical                  
            $this->Cell($w,$h, utf8_decode($columna),1, 2 , $align,1 );
        }
    }
 
    function datosVerticales($datos,$x,$y,$w,$h,$font,$style,$size,$align)
    {
        $this->SetXY($x,$y);   //50+45 eje x y eje y debe ser igual a cabecera    70 50
        $this->SetFont($font,$style,$size); //Fuente, Normal, tamaño
        foreach($datos as $columna)
        {
            $this->Cell($w,$h, utf8_decode($columna),1, 2 , $align );
        }
    }
 
    function cabeceraHorizontal($cabecera,$x,$y,$w,$h,$font,$style,$size,$align)
    {
        $this->SetXY($x, $y);
        $this->SetFillColor(232,232,232);
        $this->SetFont($font,$style,$size);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell($w,$h, utf8_decode($fila),1, 0 , $align ,1);
        }
    }
 
    function datosHorizontal($datos,$x,$y,$w,$h,$font,$style,$size,$align)
    {
        $this->SetXY($x,$y); // 77 = 70 posiciónY_anterior + 7 altura de las de cabecera
        $this->SetFont($font,$style,$size); //Fuente, normal, tamaño
        foreach($datos as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell($w,$h, utf8_decode($fila),1, 0 , $align );
        }
    }

    
	}


?>

