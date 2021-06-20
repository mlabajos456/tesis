
<?php
 $raiz = "..";
    
    require("../class/sentencias.php");
    require('pdf_ingreso_grano.php');
    require_once("../php/utilitario.php");
    $formato=new utilitariophp();
    $sql = new sentencias();
    $id=$_GET['id_ingreso'];
    date_default_timezone_set('America/Lima');
    $hoy = date("F j, Y, g:i a");

    session_start();
    date_default_timezone_set("America/Lima");

    if(!isset($_SESSION['nickname'])){
        header("Location: ./login.php");
     }
    $usuario = pg_fetch_array($sql->consulta("SELECT * from T_empleado e inner join  T_usuario u ON e.id_empleado = u.id_empleado WHERE u.nom_usuario = '".$_SESSION['nickname']."'"));


    $blanc="X";
    $contx = 1;
    $pdf=new PDF('L','mm','A5');
    $linea85 = $sql->consulta("SELECT * from T_detalle_ingreso as di
        inner join T_producto as p on p.id_producto = di.id_producto
        where di.id_ingreso = '$id'");
    while($r85 = pg_fetch_array($linea85)){

        $linea = $sql->consulta("SELECT i.id_ingreso, p.direccion_proveedor, p.nom_proveedor, p.num_doc_proveedor, p.telefono_proveedor,
i.procedencia, i.nro_ingreso, i.id_proveedor, i.observaciones_ingreso, i.fecha_ingreso, a.nom_almacen, i.comprador, i.id_orden_compra, i.nom_transportista
from t_ingreso as i 
        inner join T_proveedor as p on p.id_proveedor = i.id_proveedor
        inner join T_almacen as a on  a.id_almacen = i.id_almacen
        where id_ingreso = '$id'");
    while($r = pg_fetch_array($linea)){
        $id_ingreso=$r[0];    $direccion_proveedor=$r[1];    $nom_proveedor=$r[2];    //19-comprador
        $num_doc_proveedor=$r[3]; $telefono_proveedor=$r[4]; $procedencia=$r[5]; $num_ingreso=$r[6]; 
        $id_proveedor=$r[7];
        $obsercaciones=$r[8]; $fecha_ingreso=$r[9]; $nom_almacen=$r[10];$comprador=$r[11]; $id_orden_compra=$r[12]; $nom_transportista=$r[13];
    }

    if ($id_orden_compra != 0 || $id_orden_compra != "-") {        
        $linea8 = $sql->consulta("SELECT codigo from T_orden_compra where id_orden_compra = '$id_orden_compra'");
        $r8 = pg_fetch_array($linea8);
        $id_orden_compra = $r8[0];
    }else{
        $id_orden_compra = "-";
    }

    if ( strlen($procedencia) > 27) {
     $procedencia = substr($procedencia,0,27);
    }
    $anio= substr($fecha_ingreso,0,4);
    $mes= substr($fecha_ingreso,5,2);
    $dia= substr($fecha_ingreso,8,2);
    $detalle = $sql->consulta("SELECT * from T_detalle_volumen_ingreso as dv
inner join T_empaque as e on e.id_empaque = dv.id_empaque
where dv.id_detalle_ingreso = '$r85[0]'");
        
       
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetY(28);
        $pdf->SetX(150);
        $pdf->Cell(10, -13, utf8_decode('ACOPIO'), 0, 0, 'L', 0);
        $pdf->SetY(28);
        $pdf->SetX(165);
        $pdf->Cell(10, -13, utf8_decode($nom_almacen), 0, 0, 'L', 0);

        $pdf->cabeza("REGISTRO DE CONTROL DE CALIDAD DE",86,10,utf8_decode('INGRESO DE GRANO'));
        $pdf->lineado('H');
        /*********************************************************************/

        $pdf->SetTextColor(0,0,0);

        $font='Arial';
        $size=6;
        $pdf->SetFont('times', 'B', 12);
        $pdf->SetY(0);
        $miCabecera = array('PROVEEDOR','DIRECCIÓN');
        $misDatos = array($nom_proveedor,$direccion_proveedor);

        $miCabecera2 = array('CODIGO PROVEEDOR');
        $misDatos2 = array($id_proveedor);

        $misDatos3 = array( $num_ingreso);


        $miCabecera7 = array('OBSERVACIONES ','PROVEEDOR ACEPTA CONDICIONES','COMPRADOR');
        $misDatos7 = array('','------------------------','-----------------------');


        $miCabecera15 = array('RUC/DNI');
        $misDatos15 = array($num_doc_proveedor);

        $miCabecera16 = array('TELEFONO');
        $misDatos16 = array($telefono_proveedor);

        $miCabecera17 = array('TECNICO / ACOPIO');
        $misDatos17 = array($comprador);

        $miCabecera18 = array('OR.COMPRA');
        $misDatos18 = array($id_orden_compra);

        $txtprocedencia = array('PROCEDENCIA');
        $dtprocedencia = array($procedencia);

        $txtaño = array('AÑO');
        $dtaño = array($anio);

        $txtmes = array('MES');
        $dtmes = array($mes);

        $txtdia = array('DÍA');
        $dtdia = array($dia);

        $txttransportista = array('TRANSPORTISTA');
        $dttransportista = array($nom_transportista);

        $txt_nro_guia = array('NR° GUIA');
        $dt_nro_guia = array('');

        //$pdf->cabeceraVertical($miCabecera,20,50);
        //$pdf->datosVerticales($misDatos,70,50);

        $pdf->SetY(100);
        $pdf->SetX(135);
        $pdf->SetTextColor(0,0,0);

        $pdf->SetFont('times','', 6);
        $pdf->SetY(28);
        $pdf->SetX(10);
        $pdf->Cell(10, -13, utf8_decode('Datos Proporcionados por el Proveedor al momento de Registro del Presente Ingreso'), 0, 0, 'L', 0);
        $pdf->Ln(0);


        //PARTE IZQUIERDA ------------------------------------------->

        $pdf->SetFillColor(232,232,232); 
        $pdf->cabeceraVertical($miCabecera,10,23,28,4,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos,38,23,80,4,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera2,10,31,28,4,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos2,38,31,18,4,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera15,56,31,12,4,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos15,68,31,18,4,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera16,86,31,15,4,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos16,101,31,17,4,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera17,10,35,28,4,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos17,38,35,48,4,$font,'',$size,'L');

        $pdf->cabeceraVertical($miCabecera18,86,35,15,4,$font,'B',$size,'L');
        $pdf->datosVerticales($misDatos18,101,35,17,4,$font,'',$size,'L');

        $pdf->datosVerticales($misDatos3,160,10,40,6,$font,'B',10,'C');



        //PARTE DERECHA ------------------------------------------->

        $pdf->cabeceraVertical($txtprocedencia,123,23,35,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dtprocedencia,123,27,35,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($txtaño,158,23,14,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dtaño,158,27,14,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($txtmes,172,23,14,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dtmes,172,27,14,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($txtdia,186,23,14,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dtdia,186,27,14,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($txttransportista,123,31,49,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dttransportista,123,35,49,4,$font,'',$size,'C');

        $pdf->cabeceraVertical($txt_nro_guia,172,31,28,4,$font,'B',$size,'C');
        $pdf->datosVerticales($dt_nro_guia,172,35,28,4,$font,'',$size,'C');

        $pdf->SetX(10);
        $pdf->SetFont('times', '', 9);
        $pdf->SetFillColor(255,255,255);
        $pdf->Ln(5);
       // $pdf->Cell(20, 10, utf8_decode('Detalle del ingreso asignado a cuentas de la empresa'), 0, 0, 'L', 1);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //Tabla coloreada
        $miCabecera = array( utf8_decode('TICKET'), utf8_decode('PRODUCTO'),utf8_decode('EMPAQUE'),'MEDIDA','CANTIDAD','P. BRUTO',"TARA",'P. NETO','N');
        //Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(.0);
        $pdf->SetFont($font,'B',$size);
        $pdf->SetX(10);
        //Cabecera
        $h=5;

        $w0=5;
        $w1=16;
        $w2=45;
        $w3=45;
        $w4=10;
        $w5=12;
        $w6=19;
        $w7=19;
        $w8=19;
       // for ($i = 0; $i < count($miCabecera); $i++) {
             $pdf->Cell($w0, $h, $miCabecera[8], 1, 0, 'C', 1);
             $pdf->Cell($w1, $h, $miCabecera[0], 1, 0, 'C', 1);
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
        $size = 5;
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

            $ticket = "32789516";
            $producto = $r85[11];
            $empaque = $r8[8];
            $medida = "KG";
            $cantidad = $r8[1];
            $peso_bruto = $r8[2];
            $tara = $r8[3];
            $peso_neto = $r8[4];

            $total_cantidad = $total_cantidad + $cantidad;
            $total_pbruto = $total_pbruto + $peso_bruto;
            $total_tara = $total_tara + $tara;
            $total_pneto = $total_pneto + $peso_neto;

            $pdf->SetX(10);
            $h=4;
            $borde=1;

            $pdf->Cell($w0,$h,$contador,$borde,0,'C',$fill);
            $pdf->Cell($w1,$h,$ticket,$borde,0,'C',$fill);
            $pdf->Cell($w2,$h,utf8_decode($producto),$borde,0,'C',$fill);
            $pdf->Cell($w3,$h,$empaque,$borde,0,'C',$fill);
            $pdf->Cell($w4,$h,$medida,$borde,0,'C',$fill);
            $pdf->Cell($w5,$h,$cantidad,$borde,0,'C',$fill);
            $pdf->Cell($w6,$h,$peso_bruto,$borde,0,'C',$fill);
            $pdf->Cell($w7,$h,$tara,$borde,0,'C',$fill);
            $pdf->Cell($w8,$h,$peso_neto,$borde,0,'C',$fill);
            $pdf->Ln();
            $fill=!$fill;
            $contador = $contador + 1;
        }
        $y=$pdf->GetY();
        $size = 6;
        $textTotal = array('TOTALES');
        $total_cantidad  = array($total_cantidad);
        $total_pbruto  = array($total_pbruto);
        $total_tara  = array($total_tara);
        $total_pneto  = array($total_pneto );
        $pdf->cabeceraVertical($textTotal,10,$y,121,5,$font,'B',$size,'R');
        $pdf->datosVerticales($total_cantidad,131,$y,$w5,5,$font,'B',$size,'C');
        $pdf->datosVerticales($total_pbruto,143,$y,$w6,5,$font,'B',$size,'C');
        $pdf->datosVerticales($total_tara,162,$y,$w7,5,$font,'B',$size,'C');
        $pdf->datosVerticales($total_pneto,181,$y,$w8,5,$font,'B',$size,'C');


        //---------- footer ------------------------------>
        $fill=true;
        $pdf->SetX(10);
        $pdf->Ln(5);
        $pdf->GetY();        
        $y = $pdf->GetY();
        if($y < 90){
            $pdf->SetY(90);
        }
        $y = $pdf->GetY();


$linea96 = $sql->consulta("SELECT * from T_detalle_parametro_ingreso as dp
inner join T_parametro_matriz_producto as mt on mt.id_detalle_parametro_matriz = dp.id_detalle_parametro_matriz
inner join T_parametro as p on p.id_parametro = mt.id_parametro
where id_detalle_ingreso = '$r85[0]' and p.id_parametro = 7");
$r96 = pg_fetch_array($linea96);
$humedad = $r96[2];
$linea96 = $sql->consulta("SELECT * from T_detalle_parametro_ingreso as dp
inner join T_parametro_matriz_producto as mt on mt.id_detalle_parametro_matriz = dp.id_detalle_parametro_matriz
inner join T_parametro as p on p.id_parametro = mt.id_parametro
where id_detalle_ingreso = '$r85[0]' and p.id_parametro = 8");
$r96 = pg_fetch_array($linea96);
$hongos = $r96[2];
$linea96 = $sql->consulta("SELECT * from T_detalle_parametro_ingreso as dp
inner join T_parametro_matriz_producto as mt on mt.id_detalle_parametro_matriz = dp.id_detalle_parametro_matriz
inner join T_parametro as p on p.id_parametro = mt.id_parametro
where id_detalle_ingreso = '$r85[0]' and p.id_parametro = 9");
$r96 = pg_fetch_array($linea96);
$impurezas = $r96[2];
$linea96 = $sql->consulta("SELECT * from T_detalle_parametro_ingreso as dp
inner join T_parametro_matriz_producto as mt on mt.id_detalle_parametro_matriz = dp.id_detalle_parametro_matriz
inner join T_parametro as p on p.id_parametro = mt.id_parametro
where id_detalle_ingreso = '$r85[0]' and p.id_parametro = 13");
$r96 = pg_fetch_array($linea96);
$picadoso = $r96[2];
        

        $pdf->SetFont($font,'',$size);
        $pdf->Cell(90, 5, utf8_decode("ANÁLISIS DE CALIDAD VERIFICADA EN CENTRO DE ACOPIO"), 1, 0, 'C', 1);
        $pdf->SetY($y + 5);
        $pdf->Cell(22.5, 4, utf8_decode("HUMEDAD %"), 1, 0, 'C', 0);
        $pdf->Cell(22.5, 4, utf8_decode("IMPUREZAS %"), 1, 0, 'C', 0);
        $pdf->Cell(22.5, 4, utf8_decode("HONGOS %"), 1, 0, 'C', 0);
        $pdf->Cell(22.5, 4, utf8_decode("PICADOSO %"), 1, 0, 'C', 0);
        $pdf->SetY($y + 9);
        $pdf->Cell(22.5, 4, $humedad, 1, 0, 'C', 0);
        $pdf->Cell(22.5, 4, $impurezas, 1, 0, 'C', 0);
        $pdf->Cell(22.5, 4, $hongos, 1, 0, 'C', 0);
        $pdf->Cell(22.5, 4, $picadoso, 1, 0, 'C', 0);
        $pdf->SetY($y);
        $pdf->SetX(105);
        $pdf->Cell(95, 5, utf8_decode("OBSERVACIONES"), 1, 0, 'C', 1);
        $pdf->SetY($y + 5);
        $pdf->SetX(105);
        $pdf->Cell(95, 8, $obsercaciones, 1, 0, 'C', 0);
        $pdf->SetY($y + 5);
        $y = $pdf->GetY();
        $pdf->SetY($y + 11);
        $pdf->SetFont($font,'',6);

        $pdf->SetX(20);
        $pdf->Cell(60, 5, utf8_decode("__________________________________________________"), 0, 0, 'C', 0);
        $pdf->SetY($y + 14);
        $pdf->SetX(20);
        $pdf->Cell(60, 5, utf8_decode("Americo Sangama"), 0, 0, 'C', 0);
        $pdf->SetY($y + 18);
        $pdf->SetX(20);
        $pdf->Cell(60, 5, utf8_decode("V° B° Control de Calidad"), 0, 0, 'C', 0);

        $pdf->SetY($y + 11);
        $pdf->SetX(130);
        $pdf->Cell(60, 5, utf8_decode("__________________________________________________"), 0, 0, 'C', 0);
        $pdf->SetY($y + 14);
        $pdf->SetX(130);
        $pdf->Cell(60, 5, utf8_decode("Hans Lopez"), 0, 0, 'C', 0);
        $pdf->SetY($y + 18);
        $pdf->SetX(130);
        $pdf->Cell(60, 5, utf8_decode("V° B° Gestor de Compras"), 0, 0, 'C', 0);
        $pdf->SetY($y + 23);
        
        $contx = $contx +1;
    }

$pdf->Output();

   