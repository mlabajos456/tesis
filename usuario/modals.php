<!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->
<form id="guardarDatos" onsubmit="return checkSubmit()" enctype="multipart/form-data">
  <div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <H3>Registro de Usuario</H3>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>
        <div class="modal-body">
          <div id="datos_ajax_register"></div>
          <div class="col-md-12 d-flex align-items-stretch">
            <div class="row flex-grow">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class=" form-group ">
                      <label for="mobile">Persona</label>
                      <select class="form-control border-primary" style="width:100%" name="id_persona" id="id_persona">
                        <option value="0" selected=""> SELECCIONAR</option>
                        <?php
                        $cons = "SELECT id_persona, dni, nombre, apellido_paterno from t_paciente order by nombre DESC";
                        $linea = $sql->consulta($cons);
                        foreach ($linea as $r) {
                        ?>
                          <option value="<?= $r['id_persona'] ?>"><?= $r['dni'] . '-' . $r['nombre'] . ' ' . $r['apellido_paterno'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-info bg-info" id="colored-addon1">
                            <i class="fa fa-user-circle-o text-white"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Usuario" aria-label="Usuario" name="nom_usuario" id="nom_usuario" aria-describedby="colored-addon1">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-warning bg-warning" id="colored-addon1">
                            <i class="fa fa-key text-white"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Contraseña" aria-label="Username" name="pass_usuario" id="pass_usuario" aria-describedby="colored-addon1">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-warning bg-warning" id="colored-addon1">
                            <i class="fa fa-key text-white"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Confirmar contraseña" aria-label="Username" name="pw" id="pw" aria-describedby="colored-addon1">
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
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <H3>Modificar Usuario</H3>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>
        <div class="modal-body">
          <div id="datos_ajax_register"></div>
          <input type="hidden" class="form-control" id="id_registrador2" name="id_registrador2" required="required">
          <div class=" form-group ">
            <label for="mobile">Persona</label>
            <select class="form-control border-primary" style="width:100%" name="id_persona2" id="id_persona2">
              <option value="0" selected=""> SELECCIONAR</option>
              <?php
              $cons = "SELECT id_persona, dni, nombre, apellido_paterno from t_paciente order by nombre DESC";
              $linea = $sql->consulta($cons);
              foreach ($linea as $r) {
              ?>
                <option value="<?= $r['id_persona'] ?>"><?= $r['dni'] . '-' . $r['nombre'] . ' ' . $r['apellido_paterno'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-info bg-info" id="colored-addon1">
                  <i class="fa fa-user-circle-o text-white"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Usuario" aria-label="nom_usuario2" name="nom_usuario2" id="nom_usuario2" aria-describedby="colored-addon1">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-warning bg-warning" id="colored-addon1">
                  <i class="fa fa-key text-white"></i>
                </span>
              </div>
              <input type="password" class="form-control" placeholder="Contraseña" aria-label="pass_usuario2" name="pass_usuario2" id="pass_usuario2" aria-describedby="colored-addon1">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-warning bg-warning" id="colored-addon1">
                  <i class="fa fa-key text-white"></i>
                </span>
              </div>
              <input type="password" class="form-control" placeholder="Confirmar contraseña" aria-label="pw2" name="pw2" id="pw2" aria-describedby="colored-addon1">
            </div>
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cerrar</button>
          <input type="submit" id="btsubmit2" class="btn btn-primary" value="Actualizar datos" />
        </div>
      </div>
    </div>
  </div>
</form>