<?php
  $raiz='../../docs/';
  include_once($raiz.'class/head.php');
  $id_usuario=$_GET['id_usuario'];
  $cons="SELECT mu.id_modulo_usuario,m.nom_modulo,m.img_modulo,u.id_usuario,m.id_modulo  FROM t_modulo_usuario mu
  inner join t_modulos m on m.id_modulo=mu.id_modulo
  inner join t_usuario u on u.id_usuario=mu.id_usuario  where mu.id_usuario='$id_usuario'  order by mu.id_modulo_usuario";
  $val=$sql->numRegistros($cons);
?>
<!--notificaciones-->
 <link rel="stylesheet" href="<?php echo $raiz;?>assets/libs/css/style.css">
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
                 <th>Módulo</th>
                 <th>img modulo</th>
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
                <td><?=utf8_encode($r['nom_modulo'])?></td>
                <td><i class="<?=$r['img_modulo']?>"></i></td>
                <td>
                   <button type="button" class="btn btn-danger" onclick="showSwal('swalEliminar','<?php echo $r[0]?>')">
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
  <script type="text/javascript">
   //controlador SWITCH para EDITAR ESTADO   
        function sw(val,id){
         $.ajax({
          type: "POST",
          url: "modelos/switch.php",
          data: 'val='+val+'&id='+id,
           beforeSend: function(objeto){
            
            },
            success: function(datos){
            
            showToastPosition('bottom-right','Proceso correcto!','Los datos se modificaron con éxito','success');
             load(1);

          }
         });
        }
      //controlador swal para ELIMINAR


      </script> 
