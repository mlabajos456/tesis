
<form id="guardarfile" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="datafile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H4>Registrar Documentos</H4></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
    </div>
      <div class="modal-body">
          <div class="card">
            <div class="card-body">  
              <div id="file"></div>
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                    <label>Descripción</label>   
                        <div class="input-group">
              
                             <div class="input-group-prepend">
                                <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa-file text-white" ></i>
                                </span>
                             </div>
                                <input type="hidden" class="form-control" id="id_empleado" name="id_empleado" >
                                <input type="text" class="form-control" placeholder="TITULO DEL ARCHIVO" name="nom_legajo" id="nom_legajo" onkeyup = "this.value=this.value.toUpperCase()" aria-label="nom_legajo" aria-describedby="colored-addon1">
                        </div>
                 </div>                    
                 <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                      <label>Documento <i class="tip" data-tip-content="Archivos"></i></label>
                        <br>  
                       <input type="file" name="archivo" class="dropify" size="20000"/> 
                   </div>         
            </div>
        </div>
      </div>
      <div class="form-group mt-12" align="right">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
          <input type="submit" id="completar" class="btn btn-success" value="Guardar datos"/>
        </div>
    </div>
  </div>
</div>
</form>
