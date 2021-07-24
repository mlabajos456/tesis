   <!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->
   <form id="guardarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data">
     <div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog  modal-lg " role="document">
         <div class="modal-content">
           <div class="modal-header">
             <div>
               <H3>Registrar Paciente</H3>
             </div>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <div class="modal-body">
             <div id="datos_ajax_register"></div>
             <div class="row">
               <div class="col-md-12 d-flex align-items-stretch">
                 <div class="row flex-grow">
                   <div class="col-12 grid-margin">
                     <div class="card">
                       <div class="card-body">
                         <div class="form-group grid-margin ">
                           <div class="input-group">

                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>Apellido Paterno</label>

                               <input type="text" class="form-control border-primary" id="apellido_paterno" name="apellido_paterno" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">

                             </div>

                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>Apellido Materno</label>

                               <input type="text" class="form-control border-primary" id="apellido_materno" name="apellido_materno" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">

                             </div>

                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>Nombre</label>

                               <input type="text" class="form-control border-primary" id="nombre" name="nombre" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">

                             </div>
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>DNI</label>
                               <input type="text" class="form-control border-primary" placeholder="DNI" name="dni" id="dni" aria-label="dni" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">
                             </div>
                           </div>
                         </div>
                         <div class="form-group grid-margin">
                           <div class="input-group">
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>Fecha de Nacimiento</label>

                               <input type="date" class="form-control border-primary" id="fecha_nac" name="fecha_nac">

                             </div>
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label for="mobile">Sexo</label>

                               <select class="form-control border-primary" name="sexo" id="sexo">

                                 <option selected=""> SELECCIONAR</option>

                                 <option value='1'> Masculino</option>

                                 <option value='0'> Femenino</option>

                               </select>

                             </div>

                           </div>

                         </div>
                         <div class="form-group grid-margin">
                           <div class="input-group">
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                               <label>Telefono</label>
                               <input type="number" class="form-control border-primary" placeholder="Telefono" name="telefono" id="telefono" aria-label="telefono" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">
                             </div>
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label for="mobile">Estado Civil</label>

                               <select class="form-control border-primary" name="estado_civil" id="estado_civil">
                                 <option selected=""> SELECCIONAR</option>
                                 <option value='1'>Soltero</option>
                                 <option value='2'>Casado</option>
                                 <option value='3'>Divorciado</option>
                                 <option value='4'>Viudo</option>
                               </select>
                             </div>
                           </div>
                         </div>
                         <div class="form-group grid-margin">
                           <div class="input-group">
                             <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                               <label>Domicilio</label>
                               <input type="text" class="form-control border-primary" placeholder="Domicilio" name="domicilio" id="domicilio" aria-label="domicilio" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">
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
             <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
             <input type="submit" id="btsubmit" class="btn btn-primary" value="Guardar datos" />
           </div>
         </div>
       </div>
     </div>
   </form>



   <!--/******************************************************************MODIFICAR***************************************************************************/-->
   <form id="actualidarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data">
     <div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog  modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <div>
               <H3>Modificar Paciente</H3>
             </div>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

           </div>
           <div class="modal-body">
             <div id="datos_ajax_register"></div>
             <input type="hidden" class="form-control" id="id_persona" name="id_persona"  required="required">
             <div class="row">
               <div class="col-md-12 d-flex align-items-stretch">
                 <div class="row flex-grow">
                   <div class="col-12 grid-margin">
                     <div class="card">
                       <div class="card-body">
                         <div class="form-group grid-margin ">
                           <div class="input-group">

                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>Apellido Paterno</label>

                               <input type="text" class="form-control border-primary" id="apellido_paterno" name="apellido_paterno" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">

                             </div>

                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>Apellido Materno</label>

                               <input type="text" class="form-control border-primary" id="apellido_materno" name="apellido_materno" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">

                             </div>

                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>Nombre</label>

                               <input type="text" class="form-control border-primary" id="nombre" name="nombre" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">

                             </div>
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>DNI</label>
                               <input type="text" class="form-control border-primary" placeholder="DNI" name="dni" id="dni" aria-label="dni" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">
                             </div>
                           </div>
                         </div>
                         <div class="form-group grid-margin">
                           <div class="input-group">
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label>Fecha de Nacimiento</label>

                               <input type="date" class="form-control border-primary" id="fecha_nac" name="fecha_nac">

                             </div>
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label for="mobile">Sexo</label>

                               <select class="form-control border-primary" name="sexo" id="sexo">

                                 <option selected=""> SELECCIONAR</option>

                                 <option value='1'> Masculino</option>

                                 <option value='0'> Femenino</option>

                               </select>

                             </div>

                           </div>

                         </div>
                         <div class="form-group grid-margin">
                           <div class="input-group">
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                               <label>Telefono</label>
                               <input type="number" class="form-control border-primary" placeholder="Telefono" name="telefono" id="telefono" aria-label="telefono" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">
                             </div>
                             <div class="col-md-6 col-sm-12 col-xs-12 form-group ">

                               <label for="mobile">Estado Civil</label>

                               <select class="form-control border-primary" name="estado_civil" id="estado_civil">
                                 <option selected=""> SELECCIONAR</option>
                                 <option value='1'>Soltero</option>
                                 <option value='2'>Casado</option>
                                 <option value='4'>Divorciado</option>
                                 <option value='3'>Viudo</option>
                               </select>
                             </div>
                           </div>
                         </div>
                         <div class="form-group grid-margin">
                           <div class="input-group">
                             <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                               <label>Domicilio</label>
                               <input type="text" class="form-control border-primary" placeholder="Domicilio" name="domicilio" id="domicilio" aria-label="domicilio" aria-describedby="colored-addon1" onkeyup="this.value=this.value.toUpperCase()">
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
             <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
             <input type="submit" id="btsubmit" class="btn btn-primary" value="Guardar datos" />
           </div>
         </div>
       </div>
     </div>
   </form>
   <!--/******************************************************************tabla sub modulo***************************************************************************/-->