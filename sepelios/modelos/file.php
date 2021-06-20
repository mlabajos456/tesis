 <?php  

   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   require($raiz."class/correlativo.php");
   $sql = new sentencias();


  	$nom_file=$_FILES['archivo']['name'];
    $tipo_file=$_FILES['archivo']['type'];
    $tamano_file=$_FILES['archivo']['size'];
    $tmp_name=$_FILES['archivo']['tmp_name'];

    $destino=$_SERVER['DOCUMENT_ROOT'].'/revista_ucv/upload/noticias/';
    move_uploaded_file($tmp_name,$destino.$nom_file);
    $dest=$destino.$nom_file;
    $descripcion=$_POST['nom_legajo'];
    $id=$_POST['id_articulo'];
    $fecha=date('Y-m-d');
    


    //$sql->consulta("INSERT INTO t_documentos(nom_legajo, tipo_archivo, ruta, id_articulo, fecha)
	//VALUES ('$descripcion', '$tipo_file', '$nom_file', '$id', '$fecha')");
    $sql->consulta("INSERT INTO t_imagenes(ruta_imagen, id_articulo)
      VALUES ('$nom_file', '$id')");

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
            <strong>¡el registro de insertó correctamente!<?=$dest?></strong>
            
        </div>
      <?php

      }

    ?>