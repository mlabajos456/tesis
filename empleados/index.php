<?php
  $raiz='../docs/';
  $nav='../';
  $title='Empleados';
  $id_sub_modulo='15';
  
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/header.php');
  include_once($raiz.'class/nav.php');
  include_once($raiz.'class/correlativo.php');
  include_once($raiz.'class/valida_permiso.php');
  $correlativo=new correlativo();
?>
<?php
  include_once("modals.php");
?>                  
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
                  <nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>
                        <li class="breadcrumb-item"><a href="#">Empleados</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Lista</span></li>
                      </ol>
                  </nav>
                  <div class='col-xl-12'>
                    <h3 class='text-right'> 
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-download"></i> Exportar
                     </button> 
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                            <a class="dropdown-item" onclick="print_()"><i class='fa fa-file-pdf-o'></i>  PDF</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../xml/empleados1.php"><i class='fa fa-file-excel-o'></i>  Excel</a>
                      </div>  
                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dataRegister"><i class='fa fa-plus-circle'></i> Nuevo</button>
                    </h3>
                   </div>
                   <div class="datos_ajax_register"></div>
                   <div class="outer_div"></div>

            </div>
          </div>
</div>
<?php
  include_once($raiz.'class/footer.php');
?>   
<script src="js/app.js"></script>
<script>
    $(document).ready(function(){
      $('#div_validar').hide();
       load(1);
        });
</script>}

<script type="text/javascript">
  function print_(){
    window.open('../reportes/lista_empleado','_blank');
  }
</script>      