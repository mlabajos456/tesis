<?php

$raiz = "docs/";

$raizcss = "";

require($raiz . "class/sesion_l.php");



?>

<!DOCTYPE html>

<html lang="en">





<!-- Mirrored from www.urbanui.com/victory/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 06:22:44 GMT -->

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Defunciones - DIRES </title>

  <!-- plugins:css -->

  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">

  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">

  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">

  <!-- endinject -->

  <!-- plugin css for this page -->

  <!-- End plugin css for this page -->

  <!-- inject:css -->

  <link rel="stylesheet" href="docs/css/style.css">

  <!-- endinject -->

  <link rel="shortcut icon" href="docs/images/Logo-Gobierno.png" />

</head>



<body>

  <div class="container-scroller">

    <div class="container-fluid page-body-wrapper">

      <div class="row">

        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">

          <div class="row w-100">

            <div class="col-lg-8 mx-auto">

              <div class="row">

                <div class="col-lg-6 bg-white">

                  <div class="auth-form-light text-left p-5">

                    <h2>Iniciar sesión</h2>

                    <h4 class="font-weight-light">Bienvenido, por favor Ingrese sus credenciales</h4>



                    <form action="docs/class/validar-usuario.php" method="POST">

                      <div class="form-group">

                        <label for="">Usuario</label>

                        <input type="text" class="form-control" id="nick" name="nick" placeholder="Username">

                        <i class="mdi mdi-account"></i>

                      </div>

                      <div class="form-group">

                        <label for="exampleInputPassword1">Contraseña</label>

                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">

                        <i class="mdi mdi-eye"></i>

                      </div>

                      <div class="mt-5">

                        <input class="btn btn-block btn-primary btn-lg font-weight-medium" type="submit" name="Ingresar" value="Ingresar">

                      </div>

                      <div class="mt-3 text-center">

                        <a href="#" class="auth-link text-black">Olvidé mi contraseña?</a>

                      </div>



                    </form>

                  </div>

                </div>

                <div class="col-lg-6 login-half-bg d-flex flex-row">

                  <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2019 Todos los derechos reservados.</p>

                </div>

              </div>

            </div>

          </div>

        </div>

        <!-- content-wrapper ends -->

      </div>

      <!-- row ends -->

    </div>

    <!-- page-body-wrapper ends -->

  </div>

  <!-- container-scroller -->

  <!-- plugins:js -->

  <script src="vendors/js/vendor.bundle.base.js"></script>

  <!-- endinject -->

  <!-- inject:js -->

  <script src="js/off-canvas.js"></script>

  <script src="js/hoverable-collapse.js"></script>

  <script src="js/misc.js"></script>

  <script src="js/settings.js"></script>

  <script src="js/todolist.js"></script>

  <!-- endinject -->

</body>





<!-- Mirrored from www.urbanui.com/victory/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 06:22:44 GMT -->

</html>