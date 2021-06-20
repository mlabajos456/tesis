<?php
  $raiz='../../docs/';
  include_once($raiz.'class/head.php');
  $id_usuario=$_GET['id_usuario'];
  $cons="SELECT mu.id_sub_modulo_usuario,m.nom_sub_modulo,m.url_sub_modulo,u.id_usuario,m.id_sub_modulo,mo.nom_modulo,mo.img_modulo  FROM t_sub_modulo_usuario mu
  inner join t_sub_modulo m on m.id_sub_modulo=mu.id_sub_modulo
  inner join t_modulos mo on m.id_modulo=mo.id_modulo
  inner join t_usuario u on u.id_usuario=mu.id_usuario  where mu.id_usuario='$id_usuario'  order by mu.id_sub_modulo_usuario";
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
                 <th>Sub Módulo</th>
                 <th>Módulo</th>
                 <th>URL modulo</th>
                 <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
             <?php
             $cont=0;
             $linea = $sql->consulta($cons);
              while($r =  $sql->fetch_array($linea))
                 {
                    
                     $cont++;
                    ?>
              <tr>
                <td><?=$r[0]?></td>
                <td><?=$r['nom_sub_modulo']?></td>
                <td><i class="<?=$r['img_modulo']?>"></i> <?=$r['nom_modulo']?></td>
                <td><?=$r['url_sub_modulo']?></td>
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
