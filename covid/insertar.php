<?php
  $raiz='../docs/';
  $nav='../';
  $title='Formulario de defunciones';
  include($raiz.'class/head.php');
  include($raiz.'class/header.php');
  include_once($raiz.'class/nav.php');
  

?>

  

        <div class="content-wrapper">
         <div class="card" >
            <div class="card-body">
                <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                    <nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>
                        <li class="breadcrumb-item"><a href="index.php"> Formulario</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span> Nuevo Registro</span>   </li>
                      </ol>
                    </nav>
                      <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                         <li class="nav-item">
                          <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="I" aria-expanded="true">1. Identificacion</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="par12-tab" data-toggle="tab" href="#par12" role="tab" aria-controls="O">2. Diagnostico</a>
                         </li>
                         <li class="nav-item">
                          <a class="nav-link" id="par34-tab" data-toggle="tab" href="#par34" role="tab" aria-controls="J">3. Manejo</a>
                         </li>
                        
                      </ul>
                      
                  </div>

                



      <h4 class="card-title">Formulario de Sepelios Covid19</h4>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
            <form id="detalle"  name="detalle" enctype="multipart/form-data">
              <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                <div class="row"> 

        <!--  ESTABLECIMIENTO/PACIENTE -->                      
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">OGESS</label>
                      <select class="form-control border-primary"  name="id_ogess" id="id_ogess">
                        <option selected value=""> SELECCIONAR </option>
                          <?php
                            $cons="SELECT cod_ugipress, descripcion, cod_ref from ugipress";
                            $linea = $sql->consulta($cons);
                            foreach ($linea as $r){         
                          ?>
                        <option value="<?=$r['cod_ugipress']?>"><?=$r['descripcion'].' - '.$r['cod_ref']?> </option> 
                        <?php } ?> 
                      </select>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Red de Salud</label>
                      <select class="form-control border-primary"  name="id_red" id="id_red">
                        <option selected value="">Debes seleccionar una UGIPRESS antes </option>        
                          </select>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Microred de Salud</label>
                      <select class="form-control border-primary"  name="id_mred" id="id_mred">
                        <option selected vaiue="">Debe seleccionar una red de salud antes</option> 
                      </select>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Establecimientos</label>
                      <select class="form-control border-primary"  name="id_establecimiento" id="id_establecimiento">
                        <option selected value="">Debe seleccionar una micro red de salud antes</option>
                      </select>
                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Tipo Documento de Identidad</label>
                      <select class="form-control border-primary"  name="id_tipo_documento" id="id_tipo_documento">
                        <option selected value=""> SELECCIONAR</option>
                          <?php
                            $cons="SELECT id_tipo_documento, descripcion, abreviatura from tipo_documento";
                            $linea = $sql->consulta($cons);
                            foreach ($linea as $r){         
                            ?>
                        <option value="<?=$r['id_tipo_documento']?>"><?=$r['descripcion']?> 
                        </option> 
                          <?php } ?>                              
                      </select>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label>Numero de Documento de Identidad</label>
                      <input type="number" class="form-control border-primary" id="dni" name="dni">
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Sexo</label>
                      <select class="form-control border-primary"  name="id_sexo" id="id_sexo">
                        <option selected=""> SELECCIONAR</option>
                         <?php
                            $cons="SELECT s.id_sexo, s.descripcion  FROM sexo s order by s.id_sexo asc";
                            $linea = $sql->consulta($cons);
                            foreach ($linea as $r){
                            $sex = ($r['id_sexo']=='1') ? 'MASCULINO' : 'FEMENINO' ;         
                            ?>
                        <option value="<?=$r['id_sexo']?>"><?=$sex?></option> 
                          <?php } ?>                                                        
                      </select>                                   
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label>Fecha de Nacimiento</label>
                      <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
                  </div> 
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label>Apellido Paterno</label>
                      <input type="text" class="form-control border-primary" id="apell_paterno" name="apell_paterno">
                  </div>                                    
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label>Apellido Materno</label>
                      <input type="text" class="form-control border-primary" id="apell_materno" name="apell_materno">
                  </div>  
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label>Nombres</label>
                      <input type="text" class="form-control border-primary" id="nombre" name="nombre">
                  </div> 
 								  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono"></label>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Tipo de Regimen</label>
                      <select class="form-control border-primary" name="tipo_regimen" id="tipo_regimen">
                        <option selected value=""> SELECCIONAR</option>
                          <?php
                            $cons="SELECT r.id_regimen, r.descripcion from tipo_regimen r order by r.id_regimen asc";
                            $linea = $sql->consulta($cons);
                            while($r = $sql->fetch_array($linea)) {
                              echo "<option value='".$r[0]."'>".strtoupper($r[1] )."</option>";  
                            }?>                            
                      </select>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Tipo de Seguro</label>
                      <select class="form-control border-primary"  name="tipo_seguro" id="tipo_seguro">
                        <option selected=""> Seleccionar un tipo de regimen</option>
                      </select>       
                  </div>
                  <br>
                  <br>
                  <br>
                </div>
              </div>
            </div>
                                  <!--  ESTABLECIMIENTO/PACIENTE -->










      <!--  Diagnostico -->
          <div class="tab-pane fade " id="par12" role="tabpanel" aria-labelledby="par12">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
              <div class="row"> 
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Lugar de Fallecimiento</label>
                      <select class="form-control border-primary"  name="lugar_fallecimiento" id="lugar_fallecimiento">
                        <option selected=""> SELECCIONAR</option>
                        <option  value='1'> DOMICILIO</option>
                        <option  value='2'> ESTABLECIMIENTO</option>
                        <option  value='3'> OTROS</option>
                      </select>
                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Direccion / Centro Poblado / Localidad / Barrio de Fallecimiento</label>
                      <input type="text" class="form-control" id="dir_falle" name="dir_falle">
                  </div>

                                 
								  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Fecha que ingresa a IPRESS</label>
                      <input type="date" class="form-control" id="fec_ing_ipress" name="fec_ing_ipress">
                  </div>

 					  			<div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Tipo de Diagnostico</label>
                      <select class="form-control border-primary"  name="tipo_diag" id="tipo_diag">
                        <option selected=""> SELECCIONAR</option>
                        <option  value='1'> PRESUNTIVO</option>
                        <option  value='2'> DEFINITIVO</option>                       
                      </select>                
                  </div>

								  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Profesional que Certifica Fallecimiento</label>
                      <select class="form-control border-primary"  name="profesional" id="profesional">
                        <option selected="" value="-"> SELECCIONAR</option>
                          <?php
                            $cons="SELECT id_profesion, des_profesion from profesion where id_colegio = '1' order by id_profesion asc";
                            $linea = $sql->consulta($cons);
                            foreach ($linea as $r){
                                  
                            ?>
                        <option value="<?=$r['id_profesion']?>"><?=$r['des_profesion']?></option> 
                          <?php } ?> 
                      </select>       
                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="yt">Nombre y Apellidos </label>
                      <input type="text" class="form-control" id="nom_apell_per" name="nom_apell_per">
                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Codigo de Colegiatura</label>
                      <input type="text" class="form-control" id="cod_coleg" name="cod_coleg">
                  </div>

								  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">CIE-10 Causa Basica de Fallecimiento</label>
                      <select class="js-example-basic-single" style="width:100%" name="cie_basic" id="cie_basic">
                        <option selected=""> SELECCIONAR</option>
                         <?php
                            $cons="SELECT cod_cie, desc_cie from cie_10 where estado_cie = '1' order by cod_cie asc";
                            $linea = $sql->consulta($cons);
                            foreach ($linea as $r){
                                  
                            ?>
                        <option value="<?=$r['cod_cie']?>"><?=$r['desc_cie']?></option> 
                          <?php } ?> 
                      </select>       
                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Causa Basica de Fallecimiento</label>
                      <input type="text" class="form-control" id="cie_d_basic" name="cie_d_basic">
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">CIE-10 Causa Final de Fallecimiento</label>
                      <select class="form-control border-primary"  name="cie_basic_f" id="cie_basic_f">
                        <option selected=""> SELECCIONAR</option>
                            <?php
                            $cons="SELECT cod_cie, desc_cie from cie_10 where estado_cie = '1' order by cod_cie asc";
                            $linea = $sql->consulta($cons);
                            foreach ($linea as $r){
                                  
                            ?>
                        <option value="<?=$r['cod_cie']?>"><?=$r['desc_cie']?></option> 
                          <?php } ?> 
                      </select>
                  </div>
                  
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Causa Final de Fallecimiento</label>
                      <input type="text" class="form-control" id="cie_d_basic_f" name="cie_d_basic_f">
                  </div>

              </div>
            </div>
          </div>

                                  <!--  Diagnostico -->








                                  <!--  Manejo del fallecido -->
          <div class="tab-pane fade " id="par34" role="tabpanel" aria-labelledby="par34">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
              <div class="row"> 
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Fecha de Fallecimiento</label>
                      <input type="date" class="form-control" id="fec_falle" name="fec_falle">
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Manejo del Fallecido</label>
                      <select class="form-control border-primary"  name="manejo_falle" id="manejo_falle">
                        <option selected="" value=""> Seleccionar manejo del fallecido</option>
                          <?php
                            $cons="SELECT id_mf, desc_mf from manejo_fallecido order by id_mf asc";
                            $linea = $sql->consulta($cons);
                            foreach ($linea as $r){
                                  
                            ?>
                        <option value="<?=$r['id_mf']?>"><?=$r['desc_mf']?></option> 
                          <?php } ?> 
                      </select>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Fecha de Cremacion o Inhumacion</label>
                      <input type="date" class="form-control" id="fec_crema" name="fec_crema">
                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Orden de cremación o inhumación</label>
                      <select class="form-control border-primary"  name="orden_cremacion" id="orden_cremacion">
                        <option selected="">  Seleccionar el manejo del fallecido</option>
                      </select>
                  </div>


                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Empresa a Cargo de la Cremacion o Inhumacion</label>
                      <input type="text" class="form-control" id="empresa_cre" name="empresa_cre">
                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Departamento</label>
                      <select class="form-control border-primary"  name="id_departamento" id="id_departamento">
                        <option selected="" value=""> SELECCIONAR</option>
                          <?php
                            $cons="SELECT id_departamento, nom_departamento from t_departamento";
                            $linea = $sql->consulta($cons);
                            while($r = $sql->fetch_array($linea)) {
                            echo "<option value='".$r[0]."'>".strtoupper($r[1] )."</option>";  
                            }
                          ?>
                      </select>
                                   
                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Provincia</label>
                      <select class="form-control border-primary" name="id_provincia" id="id_provincia">
                        <option selected=""> SELECCIONAR</option>
                      </select>
                  </div>
                  
                  <div class="col-md-3 col-sm-12 col-xs-12 form-group "> 
                    <label for="mobile">Distrito</label>
                      <select class="form-control border-primary"  name="id_distrito" id="id_distrito">
                        <option selected=""> SELECCIONAR</option>
                      </select>                                   
                  </div>

								  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Adjuntar Documento</label>
                      <input type="file" name="imagen" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Documento">
                            <div class="input-group-append">
                              <button class="file-upload-browse btn btn-info" type="button">Cargar</button>                          
                            </div>
                        </div>
                  </div>

                  <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                    <label for="telefono">Costo del Servicio</label>
                      <input type="text" class="form-control" id="costo_serv" name="costo_serv">
                  </div>

                  <div class="col-md-9 col-sm-12 col-xs-12 form-group ">
                    <label>Observaciones</label>
                      <td > <textarea name="observaciones" class="form-control"  rows="4" id="observaciones" spellcheck="true" required="required" ></textarea></td>
                  </div> 
                  
              </div>


                                  <?php // COPIAR HASTA AQUI ?>

                                   <div class="form-group mt-12" align="right">
                                        <button type="submit" class="btn btn-success mr-2" id="guardar"><i class="fa fa-save"></i> Guardar</button>
                                        <button onclick="salir()" class="btn btn-outline-danger">Volver</button>
                                  </div>
            </div> 
          </div>  
        </form>    
      </div>
    </div>
  </div>

<?php
  include_once($raiz.'class/footer.php');
?>   
<script src="js/app.js"></script>
<script type="text/javascript">
  
    
  function salir(){
    window.location='index.php';
  } 

 


</script> 
<script type="text/javascript">
  
 


</script>