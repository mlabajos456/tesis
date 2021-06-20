
 <!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->
<form id="guardarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H3>Insertar Área</H3></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div id="datos_ajax_register"></div>
        
         <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info bg-info" id="colored-addon1">
                          <i class="fa fa-cog"></i>
                     </span>
                    </div>
                <input type="text" class="form-control" placeholder="Nombre Área" name="nom_area" id="nom_area" aria-label="nom_area" aria-describedby="colored-addon1">
            </div>
         </div>

         <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-warning bg-warning" id="colored-addon1">
                          <i class="fa fa-angle-down"></i>
                     </span>
                    </div>
                
               <select class="form-control" name="id_gerencia" id="id_gerencia" required="required">
                    <option value = "">Seleccione Gerencia</option>
                     <?php
                        $cons="SELECT m.id_gerencia,m.nom_gerencia  FROM t_grencia m order by m.id_gerencia asc";
                          $linea = $sql->consulta($cons);
                          while($r = pg_fetch_array($linea)) {
                          ?>
                          <option value = "<?php echo $r['id_gerencia']?>"><?php echo utf8_encode($r['nom_gerencia'])?></option>
                      <?php
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
                          <i class="fa fa-angle-down"></i>
                     </span>
                    </div>
                
               <select class="form-control" name="id_oficina" id="id_oficina" required="required">
                     <option value = "">Selecciona Oficina</option>
                </select>
             </label>  
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
        <div ><H3>Modificar Área</H3></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <div id="datos_ajax_register"></div>
        <input type="hidden" class="form-control" id="id_area" name="id_area" required="required" >
          

        <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info bg-info" id="colored-addon1">
                          <i class="fa fa-cog"></i>
                     </span>
                    </div>
                <input type="text" class="form-control" placeholder="Nombre área" name="nom_area" id="nom_area" aria-label="nom_area" aria-describedby="colored-addon1">
            </div>
         </div>

         <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-warning bg-warning" id="colored-addon1">
                          <i class="fa fa-angle-down"></i>
                     </span>
                    </div>
                
               <select class="form-control" name="id_gerencia_" id="id_gerencia_" required="required">
                     <?php
                        $cons="SELECT m.id_gerencia,m.nom_gerencia  FROM t_grencia m order by m.id_gerencia asc";
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
                          <i class="fa fa-angle-down"></i>
                     </span>
                    </div>
                
               <select class="form-control" name="id_oficina_" id="id_oficina_" required="required">
                     <?php
                        $cons="SELECT m.id_oficina,m.nom_oficina  FROM t_oficina m order by m.id_oficina asc";
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
        <input type="submit" id="btsubmit" class="btn btn-primary" value="Guardar datos"/>
      </div>
    </div>
  </div>
</div>
</form>

<!--/******************************************************************tabla sub modulo***************************************************************************/-->
