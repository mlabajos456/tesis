  <?php
  $raiz='../docs/';
  include_once($raiz.'class/head.php');
  $id_empleado=$_GET['id_empleado'];

   $cons="SELECT * FROM t_legajo l
    where l.id_empleado=$id_empleado";
    $val=$sql->numRegistros($cons);
?>
<!--notificaciones-->
 <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jsgrid/jsgrid.min.css" />
 <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jsgrid/jsgrid-theme.min.css" />
 <link rel="stylesheet" href="<?php echo $raiz;?>assets/libs/css/style.css">
 <link rel="stylesheet" href="<?php echo $raiz;?>vendors/jquery-file-upload/uploadfile.css">
<!--paginado-->
  <script src="<?php echo $raiz;?>vendors/jsgrid/jsgrid.min.js"></script>
  <script src="<?php echo $raiz;?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo $raiz;?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo $raiz;?>js/data-table.js"></script>
  <script src="<?php echo $raiz;?>js/js-grid.js"></script>
  <script src="<?php echo $raiz;?>vendors/jquery-file-upload/jquery.uploadfile.min.js"></script>
  <script src="<?php echo $raiz;?>js/jquery-file-upload.js"></script>

<div class="col-12">
   <?php
  if ($val>0) {
    ?>
    <div class="table-responsive">
         <table id="" class="table">
           <!--  <table id="table_id" class="display">-->
            <thead>
              <tr class="bg-primary text-light">  
                 <th>Descripción</th>
                 <th >Fecha Registro</th>
                 <th >Tipo</th>
                 <th >Descargar</th>
                 <th>acción</th>
               </tr>
            </thead>
            <tbody>
             <?php
             $cont=0;
             $linea = $sql->consulta($cons);
              while($r = $sql->fetch_array($linea))
                 {
                  $fecha =$r['fecha'];
                  $anio= substr($fecha,0,4);
                  $mes= substr($fecha,5,2);
                  $dia= substr($fecha,8,2);
                  $fecha=$dia."/".$mes."/".$anio;
                        
                    ?>
              <tr>
                <td><?=$r['1']?></td>
                <td><?=$fecha?></td>
                <td><?=$r['2']?></td>
                <td><a href="../doc_empleado/<?=$r[3]?>" title="../doc_empleado/<?=$r[3]?>"><i class="fa fa-download"></i> <?=$r['3']?></a></td>
                <td style='text-align: left;'>

                  <a href='javascript:void(0)' class='deletes'><span class='float-none float-sm-left d-block mt-1 mt-md-0 text-center'><i class='mdi mdi-close-outline text-danger' onclick="showSwal2('swalEliminar','<?php echo $r[0]?>')"title="Eliminar"></i></span></a></td>            
               </tr>
           <?php } ?>
            </tbody>
        </table>                    
    </div>
       <?php                  
  }else{
    ?>
       <div class="alert alert-primary" role="alert">
         <p><i class="mdi mdi-alert-circle"></i> No se encontraron Registros en la tabla solicitada.</p>
         <p><p><i class="fa fa-check"></i> Para comenzar a ingresar registros dar 'click' en el botón 'Agregar' de la parte Inferior.</p>
      </div>
    <?php
  }
?>
 </div>




  