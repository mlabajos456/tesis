<?php
  $raiz='../../docs/';
  $nav='../../';
  $title='modulo-usuario';
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/header.php');
  include_once($raiz.'class/nav.php');
  $id_user=$_GET['id'];
  $linea=$sql->consulta("SELECT nom_usuario from t_usuario where id_usuario='$id_user'");
  while($r=pg_fetch_array($linea))
  $nom_usuario=$r[0];  
?>
<?php
  include_once("modals.php");
?>       
      <!-- partial -->
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i> </a></li>
                        <li class="breadcrumb-item"><a href="../">Usuarios</a></li>
                        <li class="breadcrumb-item"><a href="../">Lista</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Asignar Módulo: <?=$nom_usuario?></span></li>
                      </ol>
                    </nav>
              
               <input type="hidden" required="required" class="form-control" id="iddle" name="iddle"  readonly="" value="<?php echo $id_user; ?>">
                  <div class='col-xl-12'>
                   
                    <h3 class='text-right'>   
                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dataRegister"><i class='fa fa-plus'></i> Nuevo</button>
                    </h3>
                   </div>
                   <div class="datos_ajax_register"></div>
                   <div class="outer_div"></div> 
              
            </div>
          </div>

          <!-- partial:partials/_footer.html -->
        
<?php
  include_once($raiz.'class/footer.php');
?>   
<script src="js/app.js"></script>
<script>
    $(document).ready(function(){
      var id_usuario=$("#iddle").val();
       load(1,id_usuario);
        });
</script>      