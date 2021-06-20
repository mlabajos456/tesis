<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $id_empleado = utf8_decode($_POST['id_empleado']);
   $nom_empleado = utf8_decode($_POST['nom_empleado']);
   $ape_paterno = utf8_decode($_POST['ape_paterno']);
   $ape_materno = utf8_decode($_POST['ape_materno']);
   $fecha_nacimiento = utf8_decode($_POST['fecha_nacimiento']);
   $sexo = utf8_decode($_POST['sexo']);
   $dni_empleado = utf8_decode($_POST['dni_empleado']);
   $num_telefono = utf8_decode($_POST['num_telefono']);
   $cargo = utf8_decode($_POST['cargo']);
   $nro_cus = utf8_decode($_POST['nro_cus']);
   $nro_cuenta = utf8_decode($_POST['nro_cuenta']);
   $direccion = utf8_decode($_POST['direccion']);

   $num_hijos = utf8_decode($_POST['num_hijos']);
   $estado_civil = utf8_decode($_POST['e_civil']);
   $email = utf8_decode($_POST['email']);
   $contacto = utf8_decode($_POST['nom_contacto']);
   $num_contacto = utf8_decode($_POST['num_contacto']);
  
   $linea=$sql->consulta("SELECT img_empleado from t_empleado where id_empleado='$id_empleado'");
   while($r = pg_fetch_array($linea))
    {$img=$r[0];}

    $nombre_imagen=$_FILES['imagen']['name'];
    $tipo_imagen=$_FILES['imagen']['type'];
    $tamano_imagen=$_FILES['imagen']['size'];
    $tmp_name=$_FILES['imagen']['tmp_name'];

    $destino=$_SERVER['DOCUMENT_ROOT'].'/planillas/img_empleado/';
    move_uploaded_file($tmp_name,$destino.$nombre_imagen);

    if($nombre_imagen!=""){
      $img_empleado=$nombre_imagen;
    }else{
      $img_empleado=$img;
    }


   $sql->consulta("UPDATE t_empleado set 
    nom_empleado='$nom_empleado',
    ape_paterno='$ape_paterno',
    ape_materno='$ape_materno',
    fecha_nacimiento='$fecha_nacimiento',
    sexo='$sexo',
    dni_empleado='$dni_empleado',
    num_telefono='$num_telefono',
    cargo='$cargo',
    nro_cus='$nro_cus',
    nro_cuenta='$nro_cuenta',
    direccion='$direccion',
    img_empleado='$img_empleado',
    num_hijos ='$num_hijos',
    estado_civil='$estado_civil',
    email='$email',
    contacto='$contacto',
    num_contacto='$num_contacto'

      where id_empleado='$id_empleado'");

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


        