<?php
  $raiz='../docs/';
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/utilitario.php');
   $formato=new utilitariophp();
   //$dato6=$_GET['fecha'];
   //$dato0=$_GET['fecha1'];

  //$filtro1 = ($dato6!=0 and $dato0!=0 )?"where dato6 between '$dato6' and '$dato0'":'where dato6<>0';

  $cons="SELECT es.nom_est_salud, f.dni, s.descripcion as sexo, f.apell_materno, f.apell_paterno, f.nombre, ts.descripcion as sis, td.nom_distrito, f.dir_falle, f.fec_ing_ipress, f.tipo_diag, p.des_profesion, f.nom_apell_per, f.cod_coleg, f.cie_basic, c.desc_cie, f.cie_d_basic, f.cie_basic_f, c.desc_cie, f.cie_d_basic_f, f.fec_falle, oc.desc_orden, f.fec_crema, f.empresa_cre, td.nom_distrito, f.costo_serv, f.observaciones, f.archivo
    from t_fallecidos f
    inner join establecimiento_salud es on es.cod_unico = f.id_establecimiento
    inner join sexo s on s.id_sexo = f.id_sexo 
    inner join tipo_seguro ts on ts.id_seguro = f.tipo_seguro
    inner join t_distrito td on td.id_distrito = f.lugar_fallecimiento
    inner join profesion p on p.id_profesion = f.profesional
    inner join cie_10 c on c.cod_cie = f.cie_basic
    inner join orden_cremacion oc on oc.id_crema_inhu = f.orden_cremacion ";


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
              foreach ($linea as $r) {
                # code...
              }
                 {
                    //$fecha=$r['dato6'];
                    //$date = new DateTime($fecha);
                    ?>
              <tr>
                <td><?=$r['nom_est_salud']?></td>
                <td><?=$r['dni']?></td>
                <td><?=$r['sexo']?></td>
                <td><?=$r['sis']?></td>
                <td><?=$r['apell_paterno']?></td>
                <td><a href="../Upload/Personal/<?=$r['archivo']?>"><i class="fa fa-download"></i> <?=$r['archivo']?></a></td>

                
                
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
