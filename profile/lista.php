<?php
  $raiz='../docs/';
  include_once($raiz.'class/head.php');
  $cons="SELECT a.id_area,a.nom_area,o.nom_oficina,g.nom_gerencia,g.id_gerencia,o.id_oficina  FROM t_area a
    inner join t_oficina o on o.id_oficina = a.id_oficina
    inner join t_grencia g on g.id_gerencia=o.id_gerencia
    order by a.id_oficina asc";
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
                 <th>Oficina</th>
                 <th>Gerencia</th>
                 <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
             <?php
             $cont=0;
             $linea = $sql->consulta($cons);
              while($r = $sql->fetch_array($linea))
                 {
                
                     $cont++;
                    ?>
              <tr>
                <td><?=$r[0]?></td>
                <td><?=$r[1]?></td>
                <td><?=$r[2]?></td>
                <td><?=$r[3]?></td>
                <td>
                 <button type="button" class="btn btn-outline-warning"
                                   data-toggle="modal"
                                   data-target="#dataUpdate"      
                                   data-id_area="<?php echo $r['id_area']?>" 
                                   data-nom_area="<?php echo ($r['nom_area'])?>"
                                   data-id_oficina="<?php echo ($r['id_oficina'])?>"  
                                   data-id_gerencia="<?php echo ($r['id_gerencia'])?>"  
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

