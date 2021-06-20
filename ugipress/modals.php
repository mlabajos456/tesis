
 <!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->
<form id="guardarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H3>Insertar IPRESS</H3></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div id="datos_ajax_register"></div>
        
         <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info bg-info" id="colored-addon1">
                          <i class="fa fa-tag"></i>
                     </span>
                    </div>
                <input type="text" class="form-control" placeholder="Codigo de IPRESS" name="codigo" id="codigo" aria-label="codigo" aria-describedby="colored-addon1">
            </div>
         </div>
         <div class="form-group ">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info bg-info" id="colored-addon1">
                          <i class="fa fa-tag"></i>
                     </span>
                    </div>
                <input type="text" class="form-control" placeholder="Nombre de IPRESS" name="nom_ipress" id="nom_ipress" aria-label="nom_ipress" aria-describedby="colored-addon1">
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
        <div ><H3>Modificar Categoria</H3></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <div id="datos_ajax_register"></div>
        <input type="hidden" class="form-control" id="id_categoria" name="id_categoria" required="required" >
          

        <div class="form-group">
             <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-info bg-info" id="colored-addon1">
                          <i class="fa fa-cog"></i>
                     </span>
                    </div>
                <input type="text" class="form-control" placeholder="Nombre de Categoria" name="descripcion" id="descripcion" aria-label="descripcion" aria-describedby="colored-addon1">
            </div>
         </div>

                 <?php
            //   <select class="form-control" name="id_gerencia_" id="id_gerencia_" required="required">
                    
                 //       $cons="SELECT m.id_gerencia,m.nom_gerencia  FROM t_grencia m order by m.id_gerencia asc";
                   //       $linea = $sql->consulta($cons);
                    //      while($r = pg_fetch_array($linea)) {
                     //     echo "<option value='".$r[0]."' selected>".strtoupper($r[1] )."</option>";  
                    //  }
                    
               // </select>
           ?>
           
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
