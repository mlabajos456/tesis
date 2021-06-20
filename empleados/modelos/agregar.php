<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   require($raiz."class/correlativo.php");
   $sql = new sentencias();
   $correlativo = new correlativo();

   
    $nombre_imagen=$_FILES['imagen']['name'];
    $tipo_imagen=$_FILES['imagen']['type'];
    $tamano_imagen=$_FILES['imagen']['size'];
    $tmp_name=$_FILES['imagen']['tmp_name'];

    $destino=$_SERVER['DOCUMENT_ROOT'].'/planillas/img_empleado/';
    move_uploaded_file($tmp_name,$destino.$nombre_imagen);

    if($nombre_imagen!=""){
      $img_empleado=$nombre_imagen;
    }else{
      $img_empleado="default.png";
    }
    
   $corr=$correlativo->empleado();
   $nro_empleado =$corr;// $_POST['nro_empleado'];
   $nom_empleado = $_POST['nom_empleado'];
   $ape_paterno = $_POST['ape_paterno'];
   $ape_materno = $_POST['ape_materno'];
   $fecha_nacimiento = $_POST['fecha_nacimiento'];
   $sexo = $_POST['sexo'];
   $dni_empleado = $_POST['dni_empleado'];
   $direccion = $_POST['direccion'];
   $cargo = $_POST['cargo'];
   $nro_cus = $_POST['nro_cus'];
   $nro_cuenta = $_POST['nro_cuenta'];
   $num_telefono = $_POST['num_telefono'];
   $num_contacto = $_POST['num_contacto'];
   $email = $_POST['email'];
   $contacto = $_POST['contacto'];
   $num_hijos = $_POST['num_hijos'];
   $estado_civil = $_POST['e_civil'];

   if ($fecha_nacimiento==null) {
       $fecha_nacimiento='0001-01-01';
    } 
    if ($num_hijos==null) {
       $num_hijos='0';
    } 

    $val=$sql->numRegistros("SELECT * from t_empleado e where e.dni_empleado='$dni_empleado'");

    if($val>0){

    ?>
      <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Empleado ya se encuentra registrado!</strong>
            
      </div>    
    
        <?php
    } else {

      $sql->consulta("INSERT into t_empleado (nro_empleado,nom_empleado,ape_paterno,ape_materno,fecha_nacimiento,sexo,dni_empleado,direccion,cargo,nro_cus,nro_cuenta,img_empleado,num_telefono,num_contacto,email,contacto,num_hijos,estado_civil) values('$nro_empleado','$nom_empleado','$ape_paterno','$ape_materno','$fecha_nacimiento','$sexo','$dni_empleado','$direccion','$cargo','$nro_cus','$nro_cuenta','$img_empleado','$num_telefono','$num_contacto','$email','$contacto','$num_hijos','$estado_civil')");


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

      }  ?>
     
