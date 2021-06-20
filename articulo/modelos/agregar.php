<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();

   $titulo = ($_POST['titulo']);
   $link_youtube = ($_POST['link_youtube']);
   $enlace = ($_POST['enlace']);
   $id_autor = ($_POST['id_autor']);
   $id_categoria = ($_POST['id_categoria']); 

   $resumen = ($_POST['resumen']); 
   
   $estado = 0;
   $fecha = date("Y-m-d H:i:s");
   
    $nombre_imagen=$_FILES['imagen']['name'];
    $tipo_imagen=$_FILES['imagen']['type'];
    $tamano_imagen=$_FILES['imagen']['size'];
    $tmp_name=$_FILES['imagen']['tmp_name'];

    $destino=$_SERVER['DOCUMENT_ROOT'].'/revista_ucv/upload/noticias/';
    move_uploaded_file($tmp_name,$destino.$nombre_imagen);

    if($nombre_imagen!=""){
      $img_articulo=$nombre_imagen;
    }else{
      $img_articulo="default.png";
    }


   
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
          
        ?>