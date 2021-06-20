<?php
  $raiz='../docs/';
  $nav='../';
  $title='Formulario de defunciones';
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/header.php');
  include_once($raiz.'class/nav.php');
 

?>
        <div class="content-wrapper">
         <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-newspaper-o"></i>  Formulario de defunciones</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-plus-circle"></i> <span>Nuevo Registro</span></li>
                      </ol>
                  </nav>
                   <h4 class="card-title">Formulario Publicación</h4>

              <form id="detalle"  name="detalle" enctype="multipart/form-data">
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                      <div class="row"> 

                                 <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                                    <label>Titulo</label>
                                     <input type="text" class="form-control" id="titulo" name="titulo">


                                  </div>     
                

                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                                    <label for="yt">Link Youtube</label>
                                    <input type="text" class="form-control" id="link_youtube" name="link_youtube">
                                  </div>


                                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                                  <label for="telefono">Enlace</label>
                                    <input type="text" class="form-control" id="enlace" name="enlace">
                                  </div>

                                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                                  <label for="telefono">Imagen Portada</label>
                                    <input type="file" name="imagen" class="file-upload-default">
                                      <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Imagen Portada">
                                        <div class="input-group-append">
                                          <button class="file-upload-browse btn btn-info" type="button">Cargar</button>                          
                                        </div>
                                      </div>
                                  </div>

                                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                                   <label for="mobile">Tipo Doc</label>
                                                      
                                              <select class="form-control border-primary"  name="id_autor" id="id_autor">
                                                    <option selected=""> SELECCIONAR</option>

                                                       <?php
                                                          $cons="SELECT m.id_autor,m.nombre  FROM t_autor m order by m.id_autor asc";
                                                            $linea = $sql->consulta($cons);
                                                            while($r = $sql->fetch_array($linea)) {
                                                             echo "<option value='".$r[0]."'>".strtoupper($r[1] )."</option>";  
                                                        }
                                                        ?>
                                                      
                                                  </select>
                                   
                                  </div>

                                <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                                   <label for="mobile">Categoría</label>
                                                      
                                              <select class="form-control border-primary"  name="id_categoria" id="id_categoria">
                                                    <option selected=""> SELECCIONAR</option>

                                                     <?php
                                                          $cons="SELECT m.cod_unico, m.nom_est_salud  FROM establecimiento_salud m order by m.cod_unico asc";
                                                            $linea = $sql->consulta($cons);
                                                            while($r = $sql->fetch_array($linea)) {
                                                             echo "<option value='".$r[0]."'>".strtoupper($r[1] )."</option>";  
                                                        }
                                                       ?>
                                                      
                                            </select>
                                   
                                  </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                                    <label>Resúmen</label>
                                     <td > <textarea name="resumen" class="form-control"  rows="4" id="resumen" spellcheck="true" required="required" ></textarea></td>


                                  </div> 
                                  <label>Contenido</label>
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                                    <div id="summernoteExample">
                                      
                                    </div>
                                  </div>
                                   <div class="form-group mt-12" align="right">
                                        <button type="submit" class="btn btn-success mr-2" id="guardar"><i class="fa fa-save"></i> Guardar</button>
                                        <button onclick="salir()" class="btn btn-outline-danger">Volver</button>
                                  </div>
                      <hr>
                    </div>  
              </form>    

                   
                
            </div>
          </div>

<?php
  include_once($raiz.'class/footer.php');
?>   
<script src="js/nuevo.js"></script>
<script type="text/javascript">
  
    
  function salir(){
    window.location='index.php';
  } 

</script>      