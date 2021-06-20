<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();

    $id_ogess=$_POST['id_ogess'];
    $id_red=$_POST['id_red'];
    $id_mred=$_POST['id_mred'];
    $id_establecimiento=$_POST['id_establecimiento'];
    $id_tipo_documento=$_POST['id_tipo_documento'];
    $dni=$_POST['dni'];
    $id_sexo=$_POST['id_sexo'];
    $fecha_nac=$_POST['fecha_nac'];
    $apell_paterno=$_POST['apell_paterno'];
    $apell_materno=$_POST['apell_materno'];
    $nombre=$_POST['nombre'];
    $tipo_regimen=$_POST['tipo_regimen'];
    $tipo_seguro=$_POST['tipo_seguro'];
    $lugar_fallecimiento=$_POST['lugar_fallecimiento'];
    $dir_falle=$_POST['dir_falle'];
    $fec_ing_ipress=$_POST['fec_ing_ipress'];
    $tipo_diag=$_POST['tipo_diag'];
    $profesional=$_POST['profesional'];
    $nom_apell_per=$_POST['nom_apell_per'];
    $cod_coleg=$_POST['cod_coleg'];
    $cie_basic=$_POST['cie_basic'];
    $cie_d_basic=$_POST['cie_d_basic'];
    $cie_basic_f=$_POST['cie_basic_f'];
    $cie_d_basic_f=$_POST['cie_d_basic_f'];
    $fec_falle=$_POST['fec_falle'];
    $manejo_falle=$_POST['manejo_falle'];
    $fec_crema=$_POST['fec_crema'];
    $orden_cremacion=$_POST['orden_cremacion'];
    $empresa_cre=$_POST['empresa_cre'];
    $id_departamento=$_POST['id_departamento'];
    $id_provincia=$_POST['id_provincia'];
    $id_distrito=$_POST['id_distrito'];
    $costo_serv=$_POST['costo_serv'];
    $observaciones=$_POST['observaciones'];
   
    $fecha = date("Y-m-d H:i:s");
   
    $nombre_imagen=$_FILES['imagen']['name'];
    $tipo_imagen=$_FILES['imagen']['type'];
    $tamano_imagen=$_FILES['imagen']['size'];
    $tmp_name=$_FILES['imagen']['tmp_name'];

    $destino=$_SERVER['DOCUMENT_ROOT'].'/defunciones/Upload/Personal/';
    move_uploaded_file($tmp_name,$destino.$nombre_imagen);

    if($nombre_imagen!=""){
      $archivo=$nombre_imagen;
    }else{
      $archivo="default.png";
    }

     $sql->consulta("INSERT into t_fallecidos (id_establecimiento
      ,dni
      ,id_sexo
      ,fecha_nac
      ,apell_paterno
      ,apell_materno
      ,nombre
      ,tipo_regimen
      ,tipo_seguro
      ,lugar_fallecimiento
      ,dir_falle
      ,fec_ing_ipress
      ,tipo_diag
      ,profesional
      ,nom_apell_per
      ,cod_coleg
      ,cie_basic
      ,cie_d_basic
      ,cie_basic_f
      ,cie_d_basic_f
      ,fec_falle
      ,manejo_falle
      ,fec_crema
      ,orden_cremacion
      ,empresa_cre
      ,id_distrito
      ,costo_serv
      ,observaciones
      ,archivo) 
    values('$id_establecimiento','$dni','$id_sexo','$fecha_nac','$apell_paterno','$apell_materno','$nombre','$tipo_regimen','$tipo_seguro','$lugar_fallecimiento','$dir_falle','$fec_ing_ipress','$tipo_diag','$profesional','$nom_apell_per','$cod_coleg','$cie_basic','$cie_d_basic','$cie_basic_f','$cie_d_basic_f','$fec_falle','$manejo_falle','$fec_crema','$orden_cremacion','$empresa_cre','$id_distrito','$costo_serv','$observaciones','$archivo')");

       if ($sql->error()){
      ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error al insertar registro!</strong>
            
      </div>
        
      <?php
      }
      else{
      
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡el registro de insertó correctamente!</strong>
            
      </div>
      <?php

      }
          
        ?>
<?php 
   /*
      $sql->consulta("INSERT into t_articulo (titulo,imagen,resumen,id_autor,link_youtube,enlace,fecha,estado,id_categoria) 
    values('$titulo','$img_articulo','$resumen','$id_autor','$link_youtube','$enlace','$fecha','$estado','$id_categoria')");

       if ($sql->error()){
      ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error al insertar registro!</strong>
            
        </div>
        
      <?php
      }
      else{
      
       $linea=$sql->consulta("SELECT MAX(id_articulo) from t_articulo" );
       while($r = $sql->fetch_array($linea)){$respuesta=$r[0];}
       echo $respuesta;

      }
     */     
        ?>