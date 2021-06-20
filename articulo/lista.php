<?php
  $raiz='../docs/';
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/utilitario.php');
   $formato=new utilitariophp();
   $dato6=$_GET['fecha'];
   $dato0=$_GET['fecha1'];

  $filtro1 = ($dato6!=0 and $dato0!=0 )?"where dato6 between '$dato6' and '$dato0'":'where dato6<>0';

  $cons="SELECT dato1,dato2,dato3,dato4,dato5,dato6 from formulario ".$filtro1;
  $val=$sql->numRegistros($cons);
?>
<!--notificaciones-->
 <link rel="stylesheet" href="<?php echo $raiz;?>assets/libs/css/style.css">
 <!--check--->
 <!--<script src="<?php echo $raiz;?>js/misc.js"></script>-->
<!--paginado-->
  <script src="<?php echo $raiz;?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo $raiz;?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo $raiz;?>js/data-table.js"></script>
<!--fin paginado-->
<div class="col-12">

  <?php
  if ($val>0) {
    ?>
    <div class="table-responsive">
        <table id="order-listing" class="table">
            <thead>
              <tr class="bg-white text-black">  
                  <th>Id #</th>
                  <th>dato1</th>
                  <th>dato2</th>
                  <th><i class="fa fa-tags"></i> dato3</th>
                  <th><i class="fa fa-user-o"></i> dato4</th>
                  <th><i class="fa fa-calendar-o"></i> Fecha</th>
                  <th><i class="fa fa-cog"></i> acción</th>
                  
             
               </tr>
            </thead>
            <tbody>
             <?php
            
             $linea = $sql->consulta($cons);
              while($r = $sql->fetch_array($linea))
                 {
                    $fecha=$r['dato6'];
                    $date = new DateTime($fecha);
                    ?>
              <tr>
                <td><?=$r['dato1']?></td>
                <td><?=$r['dato5']?></td>
                <td><?=$r['dato2']?></td>
                <td><?=$r['dato3']?></td>
                <td><?=$r['dato4']?></td>
                <td><?php echo $date->format('d/m/Y');?></td>
                
                <td>                
                 <a href="modificar.php?id_articulo=<?php echo $r['id_articulo']?>"> <button type="button" name="editar" id="editar" class="btn btn-outline-warning" onclick="change_pic('<?= $r["imagen"]?>')">
                         <i class="fa fa-edit"></i>
                    </button></a>
                   <button type="button" class="btn btn-outline-danger" onclick="showSwal('swalEliminar','<?php echo $r[0]?>')">
                    <i class="fa fa-trash"></i> 
                   </button>
                </td>
              </tr>
           <?php
           } ?>
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
