<?php
 $raiz = "..";
    
    require("../class/sentencias.php");
    require('pdf_listar_proveedores.php');
    require_once("../php/utilitario.php");
    $formato=new utilitariophp();
    $sql = new sentencias();

    $actividad_principal=$_GET['id_actividad_principal'];
    $filtro =($actividad_principal=='0')? "":"where ap.id_actividad_principal='$actividad_principal'";

    date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");
    $blanc="X";
    $contx = 1;
    $pdf=new PDF('L','mm','A4');
    $pdf->SetMargins(10, 20 , 0);
    $pdf->SetAutoPageBreak(true,38);

    
//OSTIABIENDA
    
    $detalle = $sql->consulta("SELECT p.id_proveedor, p.nom_proveedor, tp.descri_tipo_proveedor, p.num_doc_proveedor, p.telefono_proveedor, p.direccion_proveedor, p.web_proveedor,
                                              p.nom_contacto_proveedor, p.telefono_contacto_proveedor,
                                              p.mail_contacto_proveedor, c.nom_ciudad, pr.nom_provincia, 
                                              d.nom_departamento, pa.nom_pais, p.id_tipo_proveedor, p.id_ciudad,pa.id_pais,
                                              d.id_departamento, pr.id_provincia,p.cuenta_proveedor
                                              from t_proveedor p
                                              inner join T_tipo_proveedor as tp on tp.id_tipo_proveedor = p.id_tipo_proveedor
                                              inner join t_detalle_proveedor_actividad dpa on dpa.id_proveedor=p.id_proveedor
                                              inner join t_actividad_principal ap on ap.id_actividad_principal=dpa.id_actividad_principal
                                              inner join T_ciudad as c on c.id_ciudad = p.id_ciudad
                                              inner join T_provincia as pr on pr.id_provincia = c.id_provincia
                                              inner join T_departamento as d on d.id_departamento = pr.id_departamento
                                              inner join T_pais as pa on pa.id_pais = d.id_pais
                                              ".$filtro."
                                              order by p.id_proveedor asc ");
        
       
        $pdf->AliasNbPages();
        $pdf->AddPage();

        
        /*********************************************************************/

        $pdf->SetFont('times', '', 10);

        $pdf->SetFont('Times','',8);
            $pdf->SetY(10);

            $pdf->cabeza("LISTA DE PROVEEDORES",145,12,utf8_decode(''),128);
            //$pdf->lineado('H');

        $font='Arial';
        $size=8;
        $pdf->SetFont('times', 'B', 12);
        $pdf->SetY(0);
       
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
    $miCabecera = array('N',utf8_decode('Nombre Proveedor'),utf8_decode('N° Ruc'), utf8_decode('Telefono'),utf8_decode('Nombres Contacto'), utf8_decode('Telefono Contacto'), utf8_decode('Pais'), utf8_decode('Ciudad'), utf8_decode('N° Cuenta'));
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',7);
        $pdf->SetX(10);
        //Cabecera
        $h=5;

        $w0=10;     //  N
        $w1=50;     //  NOMBRE PROVEEDOR
        $w2=23;     //  N° RUC
        $w3=20;     //  TELEFONO
        $w4=40;     //  NOMBRES CONTACTO
        $w5=40;     //  TELEFONO CONTACTO
        $w6=25;     //  PAIS
        $w7=35;     //  CIUDAD
        $w8=40;     //  N° CUENTA

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
        $pdf->SetFillColor(245,245,245);
        $pdf->SetTextColor(0);
        $size = 5.4;
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

            
            $nom_proveedor = utf8_decode($r8[1]);
            $num_doc_proveedor=  $r8[3];
            $telefono_proveedor = $r8[4];
            $direccion_proveedor =  $r8[5];
            $nom_contacto_proveedor= utf8_decode ($r8[7]);
            $telefono_contacto_proveedor =  $r8[8];
            $nom_pais =  utf8_decode ($r8[13]);
            $nom_ciudad = utf8_decode ($r8[10]);
            $cuenta_proveedor = $r8[19];

            $cargo = $sql->consulta("SELECT p.id_proveedor, p.nom_proveedor, tp.descri_tipo_proveedor, p.num_doc_proveedor, p.telefono_proveedor, p.direccion_proveedor, p.web_proveedor,
                                              p.nom_contacto_proveedor, p.telefono_contacto_proveedor,
                                              p.mail_contacto_proveedor, c.nom_ciudad, pr.nom_provincia, 
                                              d.nom_departamento, pa.nom_pais, p.id_tipo_proveedor, p.id_ciudad,pa.id_pais,
                                              d.id_departamento, pr.id_provincia,p.cuenta_proveedor
                                              from t_proveedor p
                                              inner join T_tipo_proveedor as tp on tp.id_tipo_proveedor = p.id_tipo_proveedor
                                              inner join t_detalle_proveedor_actividad dpa on dpa.id_proveedor=p.id_proveedor
                                              inner join t_actividad_principal ap on ap.id_actividad_principal=dpa.id_actividad_principal
                                              inner join T_ciudad as c on c.id_ciudad = p.id_ciudad
                                              inner join T_provincia as pr on pr.id_provincia = c.id_provincia
                                              inner join T_departamento as d on d.id_departamento = pr.id_departamento
                                              inner join T_pais as pa on pa.id_pais = d.id_pais
                                              ".$filtro."
                                              order by p.id_proveedor asc");
            $r1 = pg_fetch_array($cargo);
            
            $pdf->SetX(10);
            $h=5;
            $borde=1;

            $pdf->Cell($w0,$h,$contador,$borde,0,'C',$fill);
            
            $pdf->Cell($w1,$h,$nom_proveedor,$borde,0,'L',$fill);
            $pdf->Cell($w2,$h,$num_doc_proveedor,$borde,0,'C',$fill);
            $pdf->Cell($w3,$h,$telefono_proveedor,$borde,0,'C',$fill);
            $pdf->Cell($w4,$h,$direccion_proveedor,$borde,0,'L',$fill);
            $pdf->Cell($w5,$h,$telefono_contacto_proveedor,$borde,0,'L',$fill);
            $pdf->Cell($w6,$h,$nom_pais,$borde,0,'C',$fill);
            $pdf->Cell($w7,$h,$nom_ciudad,$borde,0,'C',$fill);
            $pdf->Cell($w8,$h,$cuenta_proveedor,$borde,0,'L',$fill);
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