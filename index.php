<?php
  $raiz='docs/';
  $nav='';
  $title='Principal';
  include($raiz.'class/head.php');
  include($raiz.'class/header.php');
  include($raiz.'class/nav.php');

  
?>
        <!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-account-multiple icon-lg text-info"></i>
                    <div class="ml-3">
                      <p class="mb-0">Empleados Registrados</p>
                      <h6>NINGUNO</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-account-multiple-plus icon-lg text-warning"></i>
                    <div class="ml-3">
                      <p class="mb-0">Nuevos Miembros</p>
                      <h6>2346</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-calendar-check icon-lg text-success"></i>
                    <div class="ml-3">
                      <p class="mb-0">Periodo Aperturado</p>
                      <h6> mes</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-chart-line-stacked icon-lg text-danger"></i>
                    <div class="ml-3">
                      <p class="mb-0">Cálculo </p>
                      <h6>S/ 56000</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- partial:partials/_footer.html -->
<?php
  include($raiz.'class/footer.php');
?>       