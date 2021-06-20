<?php
   session_start();
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();

   $titulo = ($_POST['titulo']);
   $link_youtube = ($_POST['link_youtube']);
   $enlace = ($_POST['enlace']);
   $id_autor = ($_POST['id_autor']);
   $id_categoria = ($_POST['id_categoria']); 
   $id_articulo = ($_POST['id_articulo']); 
   $resumen = ($_POST['resumen']); 
   
  // $parrafo1 = utf8_decode($_POST['parrafo1']); 
  // $parrafo2 = utf8_decode($_POST['parrafo2']); 
  // $parrafo3 = utf8_decode($_POST['parrafo3']); 
  // $parrafo4 = utf8_decode($_POST['parrafo4']); 
  // $parrafo5 = utf8_decode($_POST['parrafo5']); 
   //$parrafo6 = utf8_decode($_POST['parrafo6']); 

   $linea=$sql->consulta("SELECT imagen from t_articulo where id_articulo='$id_articulo'");
   while($r = mysqli_fetch_array($linea))
    {
      $img=$r[0];
    }

    $nombre_imagen=$_FILES['imagen']['name'];
    $tipo_imagen=$_FILES['imagen']['type'];
    $tamano_imagen=$_FILES['imagen']['size'];
    $tmp_name=$_FILES['imagen']['tmp_name'];

    $destino=$_SERVER['DOCUMENT_ROOT'].'/revista_ucv/upload/noticias/';
    move_uploaded_file($tmp_name,$destino.$nombre_imagen);

    if($nombre_imagen!=""){
      $img_articulo=$nombre_imagen;
    }else{
      $img_articulo=$img;
    }


   $sql->consulta("UPDATE t_articulo set titulo='$titulo',link_youtube='$link_youtube',enlace='$enlace', 
    id_autor='$id_autor', id_categoria='$id_categoria', resumen='$resumen',imagen='$img_articulo'
      where id_articulo='$id_articulo'");

       if ($sql->error()){
      ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error al modificar registro!</strong>
            
        </div>
        
      <?php
      }
      else{
      
        ?>
      <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡el registro de modificó correctamente!</strong>
            
        </div>
      <?php

      }
          
        ?>


        