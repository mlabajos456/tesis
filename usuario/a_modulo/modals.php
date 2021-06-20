
 <!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->

<form id="guardarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H3>Registro de Módulo-Usuario</H3></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <div id="datos_ajax_register"></div>
        
       <div class="col-md-12 d-flex align-items-stretch">
        <div class="row flex-grow">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                   <div class="form-group">
                    <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" required="required" value="<?php echo $id_user;?>" >
                     <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text bg-warning bg-warning" id="colored-addon1">
                                  <i class="fa fa-angle-down text-white"></i>
                             </span>
                            </div>
                        
                       <select class="form-control" name="id_modulo" id="id_modulo" required="required">
                             <?php
                                $cons="SELECT m.id_modulo,m.nom_modulo  FROM t_modulos m order by m.id_modulo asc";
                                  $linea = $sql->consulta($cons);
                                  while($r = pg_fetch_array($linea)) {
                                   echo "<option value='".$r[0]."' selected>".strtoupper($r[1] )."</option>";  
                              }
                             ?>
                        </select>
                     </label>  
                    </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
        <input type="submit" id="btsubmit" class="btn btn-primary" value="Guardar datos"/>
      </div>
    </div>
  </div>
</div>
</form>



<!--/******************************************************************MODIFICAR***************************************************************************/-->
<form id="actualidarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H3>Modificar Usuario</H3></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <div id="datos_ajax_register"></div>
        <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" required="required" >
           <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info bg-info" id="colored-addon1">
                          <i class="fa fa-user"></i>
                     </span>
                    </div>
                <input type="text" class="form-control" placeholder="Nombre Empleado" name="nom_empleado" id="nom_empleado" aria-label="Nombre Empleado" aria-describedby="colored-addon1">
            </div>
         </div>
          <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info bg-info" id="colored-addon1">
                          <i class="fa fa-user-circle-o"></i>
                     </span>
                    </div>
                <input type="text" class="form-control" placeholder="Usuario" aria-label="Usuario" name="nom_usuario" id="nom_usuario" aria-describedby="colored-addon1">
            </div>
         </div>
       
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
        <input type="submit" id="btsubmit" class="btn btn-primary" value="Guardar datos"/>
      </div>
    </div>
  </div>
</div>
</form>
