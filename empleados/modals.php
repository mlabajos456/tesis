
 <!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->
<form id="guardarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H5>Registrar Empleado</H5></div>
         
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       <div id="datos_ajax_register"></div>

    <div class="row">
      <div class="col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title d-flex">Imagen 
                  </h4>
                  <input type="file" name="imagen" class="dropify" />
                </div>
              </div>
       </div>
       <div class="col-md-9 d-flex align-items-stretch">
        <div class="row flex-grow">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                  <h6>N°: <?=$correlativo->empleado()?></h6>
                  <!--div_img<nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item">Código:</li>
                        <li class="breadcrumb-item active" aria-current="page">0002&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                      </ol>
                  </nav>-->
                  <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                           <li class="nav-item">
                            <a class="nav-link active" id="dg-tab" data-toggle="tab" href="#dg" role="tab" aria-controls="dg" aria-expanded="true"> Datos Generales</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="detalles-tab" data-toggle="tab" href="#detalles" role="tab" aria-controls="detalles"> Detalle</a>
                           </li>
                           
                           
                  </ul>
                </div>
                <div class="wrapper">
                   <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dg" role="tabpanel" aria-labelledby="dg">
                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                              <div class="input-group">
                                
                               <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa-address-card text-white">&nbsp;&nbsp;<span>(*)</span></i>
                                   </span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="DNI/RUC " name="dni_empleado" id="dni_empleado"  aria-label="nom_empleado" aria-describedby="colored-addon1">
                                  <div id="div_validar">
                                   <span class="input-group-btn">
                                   <button type="button" class="btn btn-info btn-sm" id="val_sunat" data-toggle="modal" data-target="#dataEmpleado"><i class='fa fa-search'></i> Validar</button>
                                  </span>
                                 </div>
                          </div>
                          
                        </div>
                         <div class="col-md-6">
                        <div class="form-group row">
                         
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="doc" id="r1" value="0" checked>
                                DNI
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="doc" id="r2" value="1">
                                RUC
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                           <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa-user text-white" >&nbsp;&nbsp;<span>(*)</span></i>
                                   </span>
                                  </div>
                              <input type="text" class="form-control" placeholder="NOMBRE EMPLEADO" name="nom_empleado" id="nom_empleado" onkeyup = "this.value=this.value.toUpperCase()" aria-label="nom_empleado" aria-describedby="colored-addon1">
                            </div>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                           <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                    <i class="fa fa-user text-white">&nbsp;&nbsp;<span>(*)</span></i>
                                </span>
                              </div>
                              <input type="text" class="form-control" placeholder="APELLIDO PATERNO" name="ape_paterno" id="ape_paterno" onkeyup = "this.value=this.value.toUpperCase()" aria-label="ape_paterno" aria-describedby="colored-addon1">
                          </div>
                         </div>
                      
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                    <i class="fa fa-user text-white">&nbsp;&nbsp;<span>(*)</span></i>
                               </span>
                              </div>
                              <input type="text" class="form-control" placeholder="APELLIDO MATERNO" name="ape_materno" id="ape_materno" onkeyup = "this.value=this.value.toUpperCase()" aria-label="nom_empleado" aria-describedby="colored-addon1">
                          </div>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                           <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa- text-white">Nacimiento</i>
                                   </span>
                                  </div>
                              <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"  aria-label="fecha_nacimiento" aria-describedby="colored-addon1">
                          </div>
                       </div>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                           <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa-transgender text-white"></i>
                                   </span>
                                  </div>
                              
                             <select class="form-control" name="sexo" id="sexo" required="required">
                                   <option value="0">FEMENINO</option>
                                   <option value="1">MASCULINO</option>
                              </select>
                        
                          </div>
                       </div>
                      </div>
                      
                    </div> 

                <!--**************************************************************************************-->
               
                   <div class="tab-pane fade " id="detalles" role="tabpanel" aria-labelledby="detalles">
                      <div class="row">
                         <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                             <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                          <i class="fa fa-phone text-white" >&nbsp;&nbsp;</i>
                                     </span>
                                    </div>
                                <input type="text" class="form-control" placeholder="TELÉFONO" name="num_telefono" id="num_telefono" onkeyup = "this.value=this.value.toUpperCase()" aria-label="num_telefono" aria-describedby="colored-addon1">
                            </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                             <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                          <i class="fa fa-user text-white">&nbsp;&nbsp;</i>
                                     </span>
                                    </div>
                                <input type="text" class="form-control" placeholder="CARGO" name="cargo" id="cargo" onkeyup = "this.value=this.value.toUpperCase()" aria-label="cargo" aria-describedby="colored-addon1">
                            </div>
                         </div>
                         
                          
                         <div class="col-md-4 col-sm-12 col-xs-12 form-group ">
                             <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                          <i class="fa fa-user text-white">&nbsp;&nbsp;</i>
                                     </span>
                                    </div>
                                <input type="text" class="form-control" placeholder="NÚMERO CUS" name="nro_cus" id="nro_cus" onkeyup = "this.value=this.value.toUpperCase()" aria-label="nro_cus" aria-describedby="colored-addon1">
                            </div>
                         </div>
                       </div>
                        <div class="row"> 
                           <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                                   <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                                <i class="fa fa-address-card text-white">&nbsp;&nbsp;</i>
                                           </span>
                                          </div>
                                      <input type="text" class="form-control" placeholder="EMAIL" name="email" id="email"  onkeyup = "this.value=this.value.toUpperCase()" aria-label="email" aria-describedby="colored-addon1">
                                  </div>
                              </div>
                              <div class="col-md-8 col-sm-6 col-xs-12 form-group ">
                               <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                            <i class="fa fa-home text-white" >&nbsp;&nbsp;</i>
                                       </span>
                                      </div>
                                  <input type="text" class="form-control" placeholder="DIRECCIÓN" name="direccion" id="direccion" onkeyup = "this.value=this.value.toUpperCase()" aria-label="direccion" aria-describedby="colored-addon1">
                               </div>
                              </div>
                            
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                                   <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                                <i class="fa fa-address-card text-white">&nbsp;&nbsp;</i>
                                           </span>
                                          </div>
                                      <input type="number" class="form-control" placeholder="NÚMERO HIJOS" name="num_hijos" id="num_hijos"  aria-label="num_hijos" aria-describedby="colored-addon1">
                                  </div>
                          </div>
                          <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                                   <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                            <i class="fa fa-transgender text-white"></i>
                                        </span>
                                       </div>
                                  
                                       <select class="form-control" name="e_civil" id="e_civil" >
                                             <option value="0">Seleccione Estado Civil</option>
                                             <option value="1">SOLTERO(A)</option>
                                             <option value="2">CASADO(A)</option>
                                             <option value="3">DIVORCIADO(A)</option>
                                        </select>
                        
                                  </div>
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12 form-group ">
                                   <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                                <i class="fa fa-address-card text-white">&nbsp;&nbsp;</i>
                                           </span>
                                          </div>
                                      <input type="text" class="form-control" placeholder="NÚMERO CUENTA" name="nro_cuenta" id="nro_cuenta"  aria-label="nro_cuenta" aria-describedby="colored-addon1">
                                  </div>
                            </div>
                      </div>
                      <div class="row">
                              <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                               <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                            <i class="fa fa-phone text-white" >&nbsp;&nbsp;</i>
                                       </span>
                                      </div>
                                  <input type="text" class="form-control" placeholder="TELÉFONO CONTACTO" name="num_contacto" id="num_contacto" onkeyup = "this.value=this.value.toUpperCase()" aria-label="num_contacto" aria-describedby="colored-addon1">
                               </div>
                              </div>
                               <div class="col-md-8 col-sm-6 col-xs-12 form-group ">
                               <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                            <i class="fa fa-user text-white" >&nbsp;&nbsp;</i>
                                       </span>
                                      </div>
                                  <input type="text" class="form-control" placeholder="NOMBRE CONTACTO" name="contacto" id="contacto" onkeyup = "this.value=this.value.toUpperCase()" aria-label="contacto" aria-describedby="colored-addon1">
                               </div>
                              </div>
                      </div>  
                    </div>
                    
                     <div class="form-group mt-12" align="right">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
                        <input type="submit" id="btsubmit" class="btn btn-success" value="Guardar datos"/>
                    </div>
                  </div>
               </div>
                
              </div>
           </div>
         </div>
        </div>
</div>

</div>




      </div>
      <div class="modal-footer">
        <!--Sugerencias-->
                 <!-- <div class="accordion" id="accordion-2" role="tablist">
                     <div class="card accordion-inverse-primary">
                      <div class="card-header" role="tab" id="headingTwo-2">
                        <h6 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapseTwo-2" aria-expanded="false" aria-controls="collapseTwo-2">
                            Ayuda <i class="fa fa-question-circle"></i>
                          </a>
                        </h6>
                      </div>
                      <div id="collapseTwo-2" class="collapse" role="tabpanel" aria-labelledby="headingTwo-2" data-parent="#accordion-2">
                        <div class="card-body">
                          <p>
                            Para realizar un correcto registro de Empleados le recomendamos leer las siguientes indicaciones
                          </p>
                          <ol class="pl-3">
                            <li>Asegúrese que en las casillas de texto(nombre,apellidos,dni,cargo,dirección) los datos sean únicamente texto evitar el uso de caracteres en las casillas mecionadas</li>
                            <li>Las casillas obligatorias(*) deben ser llenadas, de lo contrario el sistema no permitirá registrar los datos del empleado.</li>
                            <li>Puede arrastrar la foto del empleado a la casilla de imagen o puede seleccionar dando click en la casilla</li>
                            <li>Las extensiones de imagen pueden ser "png","jpg","jpeg","gif","bmp" </li>
                          </ol>
                          <br>
                          <i class="mdi mdi-alert-octagon mr-2"></i>Si álgún problema persiste con respecto a el registro de empleados, por favor contactar a soporte.
                        </div>
                      </div>
                    </div>
                  </div>-->
                  <!--end sugerencias-->
       
      </div>
    </div>
  </div>
</div>
</form>



<!--/******************************************************************MODIFICAR***************************************************************************/-->
<form id="actualidarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div ><H5>Modificar Empleado</H5></div>
         
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       <div id="datos_ajax_register"></div>

    <div class="row">
      <div class="col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class=div_img>
                    <h4 class="card-title d-flex">Imagen</h4>
                    <input type="file" id="imagen" name="imagen" class="dropify" data-default-file="../img_empleado/default.png" />
                  </div>                
                </div>
              </div>
       </div>
       <div class="col-md-9 d-flex align-items-stretch">
        <div class="row flex-grow">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                 <div class = "div_corre"> <h6>N°: 00002</h6> </div>
               
                  <!--<nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item">Código:</li>
                        <li class="breadcrumb-item active" aria-current="page">0002&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                      </ol>
                  </nav>-->
                  <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                           <li class="nav-item">
                            <a class="nav-link active" id="dg2-tab" data-toggle="tab" href="#dg2" role="tab" aria-controls="dg2" aria-expanded="true"> Datos Generales</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="detalles2-tab" data-toggle="tab" href="#detalles2" role="tab" aria-controls="detalles2"> Detalle</a>
                           </li>
                           
                           
                  </ul>
                </div>
                <div class="wrapper">
                   <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dg2" role="tabpanel" aria-labelledby="dg2">
                      <div class="row">
                        <input type="hidden" class="form-control" id="id_empleado" name="id_empleado" required="required" >
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                              <div class="input-group">
                                
                               <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa-address-card text-white">&nbsp;&nbsp;<span>(*)</span></i>
                                   </span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="DNI/RUC " name="dni_empleado" id="dni_empleado"  aria-label="nom_empleado" aria-describedby="colored-addon1">
                                  <div id="div_validar">
                                  <!-- <span class="input-group-btn">
                                   <button type="button" class="btn btn-info btn-sm" id="val_sunat" data-toggle="modal" data-target="#dataEmpleado"><i class='fa fa-search'></i> Validar</button>
                                  </span>-->
                                 </div>
                          </div>
                          
                        </div>
                         <div class="col-md-6">
                        <!--<div class="form-group row">
                         
                           <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="doc2" id="r12" value="0" checked>
                                DNI
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="doc2" id="r22" value="1">
                                RUC
                              </label>
                            </div>
                          </div>
                        </div>-->
                      </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                           <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa-user text-white" >&nbsp;&nbsp;<span>(*)</span></i>
                                   </span>
                                  </div>
                              <input type="text" class="form-control" placeholder="NOMBRE EMPLEADO" name="nom_empleado" id="nom_empleado" onkeyup = "this.value=this.value.toUpperCase()" aria-label="nom_empleado" aria-describedby="colored-addon1">
                            </div>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                           <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                    <i class="fa fa-user text-white">&nbsp;&nbsp;<span>(*)</span></i>
                                </span>
                              </div>
                              <input type="text" class="form-control" placeholder="APELLIDO PATERNO" name="ape_paterno" id="ape_paterno" onkeyup = "this.value=this.value.toUpperCase()" aria-label="ape_paterno" aria-describedby="colored-addon1">
                          </div>
                         </div>
                      
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                    <i class="fa fa-user text-white">&nbsp;&nbsp;<span>(*)</span></i>
                               </span>
                              </div>
                              <input type="text" class="form-control" placeholder="APELLIDO MATERNO" name="ape_materno" id="ape_materno" onkeyup = "this.value=this.value.toUpperCase()" aria-label="nom_empleado" aria-describedby="colored-addon1">
                          </div>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                           <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa- text-white">Nacimiento</i>
                                   </span>
                                  </div>
                              <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"  aria-label="fecha_nacimiento" aria-describedby="colored-addon1">
                          </div>
                       </div>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                           <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                        <i class="fa fa-transgender text-white"></i>
                                   </span>
                                  </div>
                              
                             <select class="form-control" name="sexo" id="sexo" required="required">
                                   <option value="0">FEMENINO</option>
                                   <option value="1">MASCULINO</option>
                              </select>
                        
                          </div>
                       </div>
                      </div>
                      
                    </div> 

                <!--**************************************************************************************-->
               
                   <div class="tab-pane fade " id="detalles2" role="tabpanel" aria-labelledby="detalles2">
                      <div class="row">
                         <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                             <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                          <i class="fa fa-phone text-white" >&nbsp;&nbsp;</i>
                                     </span>
                                    </div>
                                <input type="text" class="form-control" placeholder="TELÉFONO" name="num_telefono" id="num_telefono" onkeyup = "this.value=this.value.toUpperCase()" aria-label="num_telefono" aria-describedby="colored-addon1">
                            </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                             <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                          <i class="fa fa-user text-white">&nbsp;&nbsp;</i>
                                     </span>
                                    </div>
                                <input type="text" class="form-control" placeholder="CARGO" name="cargo" id="cargo" onkeyup = "this.value=this.value.toUpperCase()" aria-label="cargo" aria-describedby="colored-addon1">
                            </div>
                         </div>
                         
                          
                         <div class="col-md-4 col-sm-12 col-xs-12 form-group ">
                             <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                          <i class="fa fa-user text-white">&nbsp;&nbsp;</i>
                                     </span>
                                    </div>
                                <input type="text" class="form-control" placeholder="NÚMERO CUS" name="nro_cus" id="nro_cus" onkeyup = "this.value=this.value.toUpperCase()" aria-label="nro_cus" aria-describedby="colored-addon1">
                            </div>
                         </div>
                       </div>
                        <div class="row"> 
                          <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                                   <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                                <i class="fa fa-address-card text-white">&nbsp;&nbsp;</i>
                                           </span>
                                          </div>
                                      <input type="text" class="form-control" placeholder="EMAIL" name="email" id="email" onkeyup = "this.value=this.value.toUpperCase()" aria-label="email" aria-describedby="colored-addon1">
                                  </div>
                              </div>
                              <div class="col-md-8 col-sm-6 col-xs-12 form-group ">
                               <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                            <i class="fa fa-home text-white" >&nbsp;&nbsp;</i>
                                       </span>
                                      </div>
                                  <input type="text" class="form-control" placeholder="DIRECCIÓN" name="direccion" id="direccion" onkeyup = "this.value=this.value.toUpperCase()" aria-label="direccion" aria-describedby="colored-addon1">
                               </div>
                              </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                                   <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                                <i class="fa fa-address-card text-white">&nbsp;&nbsp;</i>
                                           </span>
                                          </div>
                                      <input type="number" class="form-control" placeholder="NÚMERO HIJOS" name="num_hijos" id="num_hijos"  aria-label="num_hijos" aria-describedby="colored-addon1">
                                  </div>
                          </div>
                          <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                                   <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                            <i class="fa fa-transgender text-white"></i>
                                        </span>
                                       </div>
                                  
                                       <select class="form-control" name="e_civil" id="e_civil" >
                                                <option value="0">Seleccione Estado Civil</option>
                                             <option value="1">SOLTERO(A)</option>
                                             <option value="2">CASADO(A)</option>
                                             <option value="3">DIVORCIADO(A)</option>
                                        </select>
                        
                                  </div>
                          </div>
                          <div class="col-md-4 col-sm-12 col-xs-12 form-group ">
                                   <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                                <i class="fa fa-address-card text-white">&nbsp;&nbsp;</i>
                                           </span>
                                          </div>
                                      <input type="number" class="form-control" placeholder="NÚMERO CUENTA" name="nro_cuenta" id="nro_cuenta"  aria-label="nro_cuenta" aria-describedby="colored-addon1">
                                  </div>
                            </div>
                      </div>
                      <div class="row">
                              <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                               <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                            <i class="fa fa-phone text-white" >&nbsp;&nbsp;</i>
                                       </span>
                                      </div>
                                  <input type="text" class="form-control" placeholder="TELÉFONO CONTACTO" name="num_contacto" id="num_contacto" onkeyup = "this.value=this.value.toUpperCase()" aria-label="num_contacto" aria-describedby="colored-addon1">
                               </div>
                              </div>
                               <div class="col-md-8 col-sm-6 col-xs-12 form-group ">
                               <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary bg-primary" id="colored-addon1">
                                            <i class="fa fa-user text-white" >&nbsp;&nbsp;</i>
                                       </span>
                                      </div>
                                  <input type="text" class="form-control" placeholder="NOMBRE CONTACTO" name="nom_contacto" id="nom_contacto" onkeyup = "this.value=this.value.toUpperCase()" aria-label="nom_contacto" aria-describedby="colored-addon1">
                               </div>
                              </div>
                      </div>  
                    </div>
                    
                     <div class="form-group mt-12" align="right">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
                        <input type="submit" id="btsubmit" class="btn btn-success" value="Guardar datos"/>
                    </div>
                  </div>
               </div>
                
              </div>
           </div>
         </div>
        </div>
</div>

</div>




      </div>
      <div class="modal-footer">

       
      </div>
    </div>
  </div>
</div>
</form>


<!--/******************************************************************tabla sub modulo <input type="hidden" class="form-control" id="id_empleado" name="id_empleado" required="required" >***************************************************************************/-->
