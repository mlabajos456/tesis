<?php
  $raiz='../docs/';
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/utilitario.php');
   $formato=new utilitariophp();
  $cons="SELECT * from t_categoria m
     order by m.id_categoria";
  $val=$sql->numRegistros($cons);
?>
<!--notificaciones-->
 <link rel="stylesheet" href="<?php echo $raiz;?>assets/libs/css/style.css">
 <!--check--->
 <script src="<?php echo $raiz;?>js/misc.js"></script>
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
              <tr class="bg-primary text-light">  
                 <th>Id #</th>
                 <th>Categoria</th>
                 <th>Acciones</th>
             
               </tr>
            </thead>
            <tbody>
             <?php
             $cont=0;
             $linea = $sql->consulta($cons);
              while($r = $sql->fetch_array($linea))
                 {
                    
                    ?>
              <tr>
                <td><?=$r['id_categoria']?></td>
                <td><?=$r['descripcion']?></td>
                <td>
                 <button type="button" class="btn btn-outline-warning"
                                   data-toggle="modal"
                                   data-target="#dataUpdate"      
                                   data-id_categoria="<?php echo $r['id_categoria']?>" 
                                   data-descripcion="<?php echo $r['descripcion']?>"
                                 
                                   >
                       <i class="fa fa-edit"></i>
                  </button>
                   <button type="button" class="btn btn-outline-danger" onclick="showSwal('swalEliminar','<?php echo $r[0]?>')">
                    <i class="fa fa-trash"></i> 
                   </button>
                </td>
              </tr>
           <?php
           $cont++; } ?>
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

 

