<?php
  $raiz='../docs/';
  $nav='../';
  $title='Articulo';
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/header.php');
  include_once($raiz.'class/nav.php');
  //$id_sub_modulo='25';
  //include_once($raiz.'class/valida_permiso.php');
  //require($raiz."class/correlativo.php");
  //$correlativo= new correlativo();
  //$nro_dato=$correlativo->dato_lab();

?>
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
                <!--<div class='col-xl-12'>
                    <h3 class='text-right'>   
                      <div align="right"><H4>Nro: 0002</H4></div>
                    </h3>
                </div>-->
                <div class="datos_ajax_register"></div>  
                <div class="col-12">
                   <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                    <nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>
                        <li class="breadcrumb-item"><a href="index.php"> Registro de Articulo</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span> Nuevo Articulo</span>   </li>
                      </ol>
                    </nav>
                      <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                         <li class="nav-item">
                          <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">1. Detalles</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="par12-tab" data-toggle="tab" href="#par12" role="tab" aria-controls="par12">2. Parrafo 1 y 2</a>
                         </li>
                         <li class="nav-item">
                          <a class="nav-link" id="par34-tab" data-toggle="tab" href="#par34" role="tab" aria-controls="par34">3. Parrafo 3 y 4</a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" id="par56-tab" data-toggle="tab" href="#par56" role="tab" aria-controls="par56">4. Parrafo 5 y 6</a>
                        </li>
                      </ul>
                  </div>
                   <div class="wrapper">
                    
                    <div class="tab-content" id="myTabContent">
                      <!--TAB DETALLE-->
                      <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                        <form action="#" id=""  name="" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-10 col-sm-12 col-xs-12 form-group ">
                             <div class="row"> 
                                 <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                    <label>Titulo</label>
                                     <input type="text" class="form-control" id="titulo" name="titulo">


                                  </div>     

                                  <input type="hidden" class="form-control" id="hidden_total" name="hidden_total" >
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                                    <label for="yt">Link Youtube</label>
                                    <input type="text" class="form-control" id="link_youtube" name="link_youtube">
                                  </div>
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                                  <label for="telefono">Enlace</label>
                                    <input type="text" class="form-control" id="enlace" name="enlace">
                                  </div>
                                   <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                                     <label for="mobile">Autor</label>
                                    <select class="js-example-basic-single" style="width:100%" name="id_autor" id="id_autor"> 
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
                                  <div class="col-md-3 col-sm-6 col-xs-12 form-group ">
                                    <label for="designation">Categoria</label>
                                      <select class="js-example-basic-single" style="width:100%" name="id_categoria" id="id_categoria"> 
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
                              </div>       
                           
                              <!--<div class="row">                                  
                                  
                                  <div class="col-md-3 col-sm-6 col-xs-12 form-group ">
                                    <label for="mobile">Sueldo Bruto</label>
                                     <input type="number" class="form-control" id="total_bruto" name="total_bruto" placeholder="Sueldo bruto" step="0.01">
                                  </div>
                              </div>-->
                               <!-- -->
                          </div>
                           <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                              <div class="row">
                                 <div class="col-md-3 col-sm-6 col-xs-12 form-group ">
                               <div class="card">
                              <div class="card-body">
                                <h4 class="card-title d-flex">Imagen 
                                </h4>
                                <input type="file" name="imagen" class="dropify" />
                              </div>
                            </div>   
                              </div>
                                <div class="col-md-8 col-sm-6 col-xs-12 form-group ">
                             <div class="form-group">
                               <div class="input-group">
                              <div class="input-group-prepend">
                              <label>RESUMEN</label>

                              </div>
                               
                              <td > <textarea name="resumen" class="WYSIWYG" cols="140" rows="10" id="resumen" spellcheck="true" required="required" ></textarea></td>
                          </div>
                            </div>  
                                </div>
                              </div>  
                              </div>    
                          
                       
                       

                          
                         </div>
                        
                      </div>
                     <!--FIN TAB DETALLE-->

                     <!--TAB APORTES-->
                      <div class="tab-pane fade " id="par12" role="tabpanel" aria-labelledby="par12">
                        
                        <div class="row">
                          <div class="col-md-12 col-sm-6 col-xs-12 form-group ">
                                      
                          <div class="form-group">
                          <div class="input-group">
                            <label>PARRAFO 1</label>
                              <div class="input-group-prepend">
                              

                              </div>
                                                          
                              <td > <textarea name="parrafo1" class="WYSIWYG" cols="150" rows="4" id="parrafo1" spellcheck="true" required="required" ></textarea></td>
                          </div>
                          </div>

                          </div>
                          <div class="col-md-8 col-sm-6 col-xs-12 form-group ">
                                      
                        <div class="form-group">
                           <label>PARRAFO 2</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                
                               
                              <td > <textarea name="parrafo2" class="WYSIWYG" cols="150" rows="4" id="parrafo2" spellcheck="true" required="required" ></textarea></td>
                              </div>
                          </div> 
                        </div>
                         
    
                       </div>
                      
                         
                      </div>
                    </div>
                      <!--FIN TAB APORTES-->

                      <!--TAB REMUNERACIONES-->

                      <div class="tab-pane fade " id="par34" role="tabpanel" aria-labelledby="par34">
                        
                       <div class="row">
                          <div class="col-md-12 col-sm-6 col-xs-12 form-group ">
                                      
                        <div class="form-group">
                          <label>PARRAFO 3</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                            
                              </div>
                               
                              <td > <textarea name="parrafo3" class="WYSIWYG" cols="150" rows="4" id="parrafo3" spellcheck="true" required="required" ></textarea></td>
                          </div>
                          </div> 
                          </div>
                          <div class="col-md-12 col-sm-6 col-xs-12 form-group ">
                                      
                        <div class="form-group">
                           <label>PARRAFO 4</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                              
                              </div>
                               
                              <td > <textarea name="parrafo4" class="WYSIWYG" cols="150" rows="4" id="parrafo4" spellcheck="true" required="required" ></textarea></td>
                          </div>
                  </div> 
                          </div>
                         
    
                       </div>
                           
                        
                      </div>
                      <!--FIN TAB REMUNERACIONES-->

                      <!--TAB DESCUENTOS-->
                      <div class="tab-pane fade " id="par56" role="tabpanel" aria-labelledby="par56">
                       
                         <div class="row">
                          <div class="col-md-12 col-sm-6 col-xs-12 form-group ">
                                      
                        <div class="form-group">
                           <label>PARRAFO 5</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                              
                              </div>
                               
                              <td > <textarea name="parrafo5" class="WYSIWYG" cols="150" rows="4" id="parrafo5" spellcheck="true" required="required" ></textarea></td>
                          </div>
                          </div> 
                          </div>
                          <div class="col-md-12 col-sm-6 col-xs-12 form-group ">
                                      
                        <div class="form-group">
                           <label>PARRAFO 6</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                             
                              </div>
                               
                              <td > <textarea name="parrafo6" class="WYSIWYG" cols="150" rows="4" id="parrafo6" spellcheck="true" required="required" ></textarea></td>
                          </div>
                          </div> 
                          </div>
                         
    
                       </div>
                          
                         
                      </div>
                      <!--FIN TAB DESCUENTOS   (class="table-success")-->
                      
                      <div class="form-group mt-12" align="right">
                            <button type="submit" class="btn btn-success mr-2" id="guardar">Guardar</button>
                            <button onclick="salir()" class="btn btn-outline-danger">Cancelar</button>
                      </div>
                      <hr>
                      
                    </div>
                  </form> 
            </div>
          </div>
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