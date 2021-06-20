<?php
  $raiz='../docs/';
  $nav='../';
  $title='Modificar Articulo';
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/header.php');
  include_once($raiz.'class/nav.php');
  include_once($raiz.'class/utilitario.php');
  $id_articulo = $_GET['id_articulo'];
  
  $formato=new utilitariophp();
  $cons="SELECT aa.id_articulo, aa.titulo, aa.imagen,a.nombre as nom_autor,aa.link_youtube,aa.enlace,aa.fecha,c.descripcion, aa.resumen, aa.id_autor, aa.contenido, aa.id_categoria FROM t_articulo aa
      inner join t_autor a on a.id_autor= aa.id_autor
      inner join t_categoria c on c.id_categoria= aa.id_categoria where id_articulo=$id_articulo "




  //$id_sub_modulo='25';
  //include_once($raiz.'class/valida_permiso.php');
  //require($raiz."class/correlativo.php");
  //$correlativo= new correlativo();
  //$nro_dato=$correlativo->dato_lab();

?>
        <div class="content-wrapper">
         <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-newspaper-o"></i>  Publicaciones</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-plus-circle"></i> <span>Nuevo Registro</span></li>
                      </ol>
                  </nav>
                   <h4 class="card-title">Formulario Publicación</h4>

              <form id="detalle"  name="detalle" enctype="multipart/form-data">
                  <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                      <div class="row"> 
                          <?php 
                            $linea = $sql->consulta($cons);
                            
                            foreach($linea as $datos): 
                 
               
                    ?> 

                                 <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                                   <input type="hidden" class="form-control" id="id_articulo" name="id_articulo" value="<?=   $id_articulo ?>">
                                    <label>Titulo</label>
                                     <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $datos['titulo'] ?>">


                                  </div>     
                

                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                                    <label for="yt">Link Youtube</label>
                                    <input type="text" class="form-control" id="link_youtube" name="link_youtube" value="<?php echo ( $datos['link_youtube'])?>">
                                  </div>


                                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                                  <label for="telefono">Enlace</label>
                                    <input type="text" class="form-control" id="enlace" name="enlace" value="<?php echo ( $datos['enlace'])?>">
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
                                   <label for="mobile">Autor</label>
                                                      
                                              <select class="form-control border-primary"  name="id_autor" id="id_autor" >
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
                                  <script >
                                  document.getElementById("id_autor").value = "<?php echo ($datos['id_autor'])?>";

                                  </script>

                                <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                                   <label for="mobile">Categoría</label>
                                                      
                                              <select class="form-control border-primary"  name="id_categoria" id="id_categoria">
                                                    <option selected=""> SELECCIONAR</option>

                                                      <?php
                                                          $cons="SELECT m.id_categoria,m.descripcion  FROM t_categoria m order by m.id_categoria asc";
                                                            $linea = $sql->consulta($cons);
                                                            while($r = $sql->fetch_array($linea)) {
                                                             echo "<option value='".$r[0]."'>".strtoupper($r[1] )."</option>";  
                                                        }
                                                       ?>
                                                      
                                            </select>
                                   
                                  </div>
                                   <script >
                                  document.getElementById("id_categoria").value = "<?php echo ($datos['id_categoria'])?>";

                                  </script>
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                                    <label>Resúmen</label>
                                     <td > <textarea name="resumen" class="form-control"  rows="4" id="resumen" spellcheck="true" required="required" > <?= ( $datos['resumen'])?></textarea></td>


                                  </div> 
                                  <label>Contenido</label>
                                  
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                                    <div id="summernoteExample">
                                      <?php echo ($datos['contenido']);?>
                                    </div>
                                  </div>

                                <?php endforeach ?>

                                
                                <br>
                                   <div class="form-group mt-12" align="right">
                                        <button type="submit" class="btn btn-success mr-2" id="actualizar"><i class="fa fa-save"></i> Guardar</button>
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