<!--  <form action="modelos/agregar.php" method="POST" enctype="multipart/form-data"> -->
<form id="guardarDatos" onsubmit="return checkSubmit();" enctype="multipart/form-data">
  <div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <H3>Insertar Red</H3>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div id="datos_ajax_register"></div>


          <div class="form-group ">
            <label for="mobile">UGIPRESS</label>
            <select class="form-control border-primary" name="cod_ugipress" id="cod_ugipress">
              <option selected="0" value=""> SELECCIONAR</option>
              <?php
              $cons = "SELECT cod_ugipress, descripcion from t_ugipress";
              $linea = $sql->consulta($cons);
              while ($r = $sql->fetch_array($linea)) {
                echo "<option value='" . $r[0] . "'>" . strtoupper($r[1]) . "</option>";
              }
              ?>
            </select>
          </div>


          <div class="form-group ">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-info bg-info" id="colored-addon1">
                  <i class="fa fa-tag"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Codigo de Red" name="cod_red" id="cod_red" aria-label="cod_red" aria-describedby="colored-addon1">
            </div>
          </div>

          <div class="form-group ">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-info bg-info" id="colored-addon1">
                  <i class="fa fa-tag"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre de Red" name="desc_red" id="desc_red" aria-label="desc_red" aria-describedby="colored-addon1">
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
            <H3>Modificar Categoria</H3>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>
        <div class="modal-body">
          <div id="datos_ajax_register"></div>
          <input type="hidden" class="form-control" id="id_red2" name="id_red2" required="required">


          <div class="form-group ">
            <label for="mobile">UGIPRESS</label>
            <select class="form-control border-primary" name="cod_ugipress2" id="cod_ugipress2">
              <option selected="0" value=""> SELECCIONAR</option>
              <?php
              $cons = "SELECT cod_ugipress, descripcion from t_ugipress";
              $linea = $sql->consulta($cons);
              while ($r = $sql->fetch_array($linea)) {
                echo "<option value='" . $r[0] . "'>" . strtoupper($r[1]) . "</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group ">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-info bg-info" id="colored-addon1">
                  <i class="fa fa-tag"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre de Red" name="desc_red2" id="desc_red2" aria-label="desc_red2" aria-describedby="colored-addon1">
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