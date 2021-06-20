
 <!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->

<form id="guardarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H3>Registro sub módulo usuario</H3></div>
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
                        <option value = "">Seleccione Módulo</option>
                             <?php
                                $cons="SELECT m.id_modulo,m.nom_modulo  FROM t_modulos m
                                inner join t_modulo_usuario mu on mu.id_modulo =m.id_modulo
                                inner join t_usuario u on u.id_usuario=mu.id_usuario
                                where mu.id_usuario='$id_user'
                                 order by m.id_modulo asc";
                                  $linea = $sql->consulta($cons);
                                  while($r = pg_fetch_array($linea)) {
                                   echo "<option value='".$r[0]."' selected>".strtoupper($r[1] )."</option>";  
                              }
                             ?>
                        </select>
                     </label>  
                    </div>
                 </div>
                 <div class="form-group">
                 <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-warning bg-warning" id="colored-addon1">
                              <i class="fa fa-angle-down text-white"></i>
                         </span>
                        </div>
                    
                   <select class="form-control" name="id_sub_modulo" id="id_sub_modulo" required="required">
                         <option value = "">Selecciona Sub MÓDULO</option>
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



