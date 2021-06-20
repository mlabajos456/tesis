
 <!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->
<form id="guardarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H3>Insertar condición laboral</H3></div>
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
                <input type="text" class="form-control" placeholder="condición laboral" name="nom_condicion_laboral" id="nom_condicion_laboral" aria-label="nom_modulo" aria-describedby="colored-addon1">
            </div>
         </div>
        
         </div>  
          
         
         <div class="form-group">

    

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
        <div ><H3>Modificar Módulo</H3></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <div id="datos_ajax_register"></div>
        <input type="hidden" class="form-control" id="id_condicion_laboral" name="id_condicion_laboral" required="required" >
          
           <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info bg-info" id="colored-addon1">
                          <i class="fa fa-cog"></i>
                     </span>
                    </div>
                <input type="text" class="form-control" placeholder="condición laboral" name="nom_condicion_laboral" id="nom_condicion_laboral" aria-label="nom_modulo" aria-describedby="colored-addon1">
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


