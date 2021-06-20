
<?php
$nav='../';
$raiz='../docs/';
$title='Perfil';
include_once($raiz.'class/head.php');
include_once($raiz.'class/header.php');
include_once($raiz.'class/nav.php');

$cons="SELECT * FROM usuarios where id_usuario='".$_SESSION['id']."'";
$linea = $sql->consulta($cons);
while($r =  $sql->fetch_array($linea))
{
    $id_usuario=$r[0];
    $pass= $r[1];
    $nom_usuario= $r[2];
    $nom_empleado= $r[4];
    $img=$r['img_user'];


} 
?>
     <div class="content-wrapper">
          <div class="row user-profile">
            <div class="col-lg-4 side-left d-flex align-items-stretch">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body avatar">
                      <h4 class="card-title">Información</h4>
                      <img src="<?php echo $raiz;?>images/faces/<?php echo $img?>" alt="">
                      <p class="name"><?php echo $nom_empleado; ?></p>
                      <p class="designation"><?php echo $nom_usuario; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-12 stretch-card">
                  <div class="card">
                    <div class="card-body overview">
                      <h4 class="card-title">Seleccione su Avatar</h4>
                      <ul class="achivements">
                        <a href="" onclick="cambiar('avatar.JPG',<?php echo $_SESSION['id']?>)"><li><img src="<?php echo $raiz;?>images/faces/avatar.JPG" alt=""  width="80" ></li></a>
                        <a href="" onclick="cambiar('avatar1.JPG',<?php echo $_SESSION['id']?>)"><li><img src="<?php echo $raiz;?>images/faces/avatar1.JPG" alt="" width="80" ></li></a>
                         <a href="" onclick="cambiar('avatar2.JPG',<?php echo $_SESSION['id']?>)"><li><img src="<?php echo $raiz;?>images/faces/avatar2.JPG" alt="" width="80" ></li></a>
                      </ul>
                       <ul class="achivements">
                       <a href="" onclick="cambiar('avatar3.JPG',<?php echo $_SESSION['id']?>)"><li><img src="<?php echo $raiz;?>images/faces/avatar3.JPG" alt="" width="80" ></li></a>  
                       <a href="" onclick="cambiar('avatar4.JPG',<?php echo $_SESSION['id']?>)"><li><img src="<?php echo $raiz;?>images/faces/avatar4.JPG" alt="" width="80" ></li></a>  
                       <a href="" onclick="cambiar('avatar5.JPG',<?php echo $_SESSION['id']?>)"><li><img src="<?php echo $raiz;?>images/faces/avatar5.JPG" alt="" width="80" ></li></a>
                      </ul>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 side-right stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Detalles</h4>
                    <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                     
                      

                      <li class="nav-item">
                        <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Seguridad</a>
                      </li>
                    </ul>
                  </div>
                  <div class="wrapper">
                    <hr>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info">
                        <form action="#">
                          <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Change user name">
                          </div>
                          <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" placeholder="Change designation">
                          </div>
                          <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Change mobile number">
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Change email address">
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" rows="6" class="form-control" placeholder="Change address"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="website">Website URL</label>
                            <input type="text" class="form-control" id="website" placeholder="Change website url">
                          </div>
                          <div class="form-group mt-5">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                            <button class="btn btn-outline-danger">Cancel</button>
                          </div>
                        </form>
                      </div><!-- tab content ends -->
  
                      <div class="tab-pane fade show active" id="security" role="tabpanel" aria-labelledby="security-tab">
                      <form id="passupdate" onsubmit="return checkSubmit();" enctype="multipart/form-data" >
                          <div class="form-group">
                            <div class="datos_ajax_register"></div>  
                            <label for="change-password">Cambiar Contraseña</label>
                             <input type="hidden" class="form-control" id="pass" value= "<?=$pass?>">
                             <input type="hidden" class="form-control" id="id" name="id" value= "<?=$id_usuario?>">
                            <input type="password" class="form-control" id="a_pass" placeholder="Ingrese su contraseña actual">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" id="n_pass" name= "n_pass" placeholder="Ingrese su nueva contraseña">
                          </div>
                           <div class="form-group">
                            <input type="password" class="form-control" id="n2_pass" placeholder="Repita su nueva contraseña">
                          </div>
                          <div class="form-group mt-5">
                            <button type="submit" class="btn btn-success mr-2"id="actualizar">Actualizar</button>
                           
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

					<!-- partial:../../partials/_footer.html -->
	<?php
  include_once($raiz.'class/footer.php');
  ?> 

<script src="js/app.js"></script>

    
     