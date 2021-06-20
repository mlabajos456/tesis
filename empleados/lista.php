<?php
  $raiz='../docs/';
  include_once($raiz.'class/head.php');
  $cons="SELECT * FROM t_empleado e
    order by e.id_empleado asc";
    $val=$sql->numRegistros($cons);
?>
<!--notificaciones-->
 <link rel="stylesheet" href="<?php echo $raiz;?>assets/libs/css/style.css">
<!--paginado-->
  <script src="<?php echo $raiz;?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo $raiz;?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo $raiz;?>js/data-table.js"></script>

<div class="col-12">
   <?php
  if ($val>0) {
    ?>
    <div class="table-responsive">
         <table id="order-listing" class="table">
           <!--  <table id="table_id" class="display">-->
            <thead>
              <tr class="bg-primary text-light">  
                 <th>Foto</th>
                 
                 <th>Nro</th>
                 <th>Nombre</th>
                 <th>Paterno</th>
                 <th>Materno</th>
                 <th>Dirección</th>
                 <th>Documentos</th>
                 <th>Nacimiento</th>    
                 <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
             <?php
             $cont=0;
             $linea = $sql->consulta($cons);
              while($r =  $sql->fetch_array($linea))
                 {
                              $nom= $r['nom_empleado'].' '.$r['ape_paterno'];
                              $fecha=$r['fecha_nacimiento'];
                              $anio= substr($fecha,0,4);
                              $mes= substr($fecha,5,2);
                              $dia= substr($fecha,8,2);
                              $fecha=$dia."/".$mes."/".$anio;
                    ?>
              <tr>
                <td><img src="<?php echo  $raiz.'../img_empleado/'.$r['img_empleado'] ?>" width="70" height="70">
                
                <td><?=$r['nro_empleado']?></td>
                <td><?=$r['nom_empleado']?></td>
                <td><?=$r['ape_paterno']?></td>
                <td><?=$r['ape_materno']?></td>
                <td><?=$r['direccion']?></td>
                <td> 
                  <a href="documentos-<?php echo $r['id_empleado']?>"><button title="Documentos" type="submit" class="btn btn-light"> <i class="fa fa-files-o"></i> Ver</button></a></td>
                 
                <td><?=$fecha?></td>
                <td>
                 <button title="Editar" type="button" class="btn btn-warning" onclick="change_pic('<?= $r["img_empleado"]?>')"
                                   data-toggle="modal"
                                   data-target="#dataUpdate"      
                                   data-id_empleado="<?php echo $r['id_empleado']?>" 
                                   data-nro_empleado="<?php echo ($r['nro_empleado'])?>"
                                   data-nom_empleado="<?php echo ($r['nom_empleado'])?>"  
                                   data-ape_paterno="<?php echo ($r['ape_paterno'])?>"
                                   data-ape_materno="<?php echo ($r['ape_materno'])?>"    
                                   data-direccion="<?php echo ($r['direccion'])?>"  
                                   data-num_telefono="<?php echo ($r['num_telefono'])?>"  
                                   data-fecha_nacimiento="<?php echo ($r['fecha_nacimiento'])?>"  
                                   data-cargo="<?php echo ($r['cargo'])?>" 
                                   data-nro_cuenta="<?php echo ($r['nro_cuenta'])?>"   
                                   data-nro_cus="<?php echo ($r['nro_cus'])?>"  
                                   data-sexo="<?php echo ($r['sexo'])?>"  
                                   data-img_empleado="<?php echo ($r['img_empleado'])?>" 
                                   data-dni_empleado="<?php echo ($r['dni_empleado'])?>"

                                   data-num_hijos="<?php echo ($r['num_hijos'])?>"  
                                   data-estado_civil="<?php echo ($r['estado_civil'])?>"  
                                   data-email="<?php echo ($r['email'])?>" 
                                   data-contacto="<?php echo ($r['contacto'])?>"  
                                   data-num_contacto="<?php echo ($r['num_contacto'])?>"

                                   >
                       <i class="fa fa-edit"></i>
                  </button>
                   <button title="Eliminar" type="button" class="btn btn-danger" onclick="showSwal('swalEliminar','<?php echo $r[0]?>')">
                    <i class="fa fa-trash"></i> 
                   </button>
                </td>
               </tr>
           <?php } ?>
            </tbody>
        </table>                    
    </div>
       <?php                  
  }else{
    ?>
       <div class="alert alert-info" role="alert">
         <p><i class="mdi mdi-alert-circle"></i> No se encontraron Registros en la tabla solicitada.</p>
         <p><p><i class="fa fa-check"></i> Para comenzar a ingresar registros dar 'click' en el botón 'Nuevo' de la parte superior.</p>
      </div>
    <?php
  }
?>
 </div>

