<?php
  $raiz='../docs/';
  include_once($raiz.'class/head.php');
  $cons="SELECT * from t_condicion_laboral order by id_condicion_laboral";
?>
<!--notificaciones-->
 <link rel="stylesheet" href="<?php echo $raiz;?>assets/libs/css/style.css">
<!--paginado-->
  <script src="<?php echo $raiz;?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo $raiz;?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo $raiz;?>js/data-table.js"></script>
<!--fin paginado-->
<div class="col-12">
    <div class="table-responsive">
        <table id="order-listing" class="table">
            <thead>
              <tr>
                 <th>Id #</th>
                 <th>Descripción</th>
                
                 <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
             <?php
             $cont=0;
             $linea = $sql->consulta($cons);
              while($r = pg_fetch_array($linea))
                 {
                
                     $cont++;
                    ?>
              <tr>
                <td><?=$r[0]?></td>
                <td><?=$r[1]?></td>
                <td>
                 <button type="button" class="btn btn-outline-warning"
                                   data-toggle="modal"
                                   data-target="#dataUpdate"      
                                   data-id_condicion_laboral="<?php echo $r['id_condicion_laboral']?>" 
                                   data-nom_condicion_laboral="<?php echo utf8_encode($r['nom_condicion_laboral'])?>"
                                  
                                   >
                       <i class="fa fa-edit"></i>
                  </button>
                   <button type="button" class="btn btn-outline-danger" onclick="showSwal('swalEliminar','<?php echo $r[0]?>')">
                    <i class="fa fa-trash"></i> 
                   </button>
                </td>
               </tr>
           <?php } ?>
            </tbody>
        </table>                    
    </div>
 </div>

