<?php
  $raiz='../docs/';
  $nav='../';
  $title='Legajo';
  include_once($raiz.'class/head.php');
  include_once($raiz.'class/header.php');
  include_once($raiz.'class/nav.php');
  include_once('file.php');
  $id_empleado=$_GET['id_empleado'];
  $nom=$sql->fetch_array($sql->consulta("SELECT nom_empleado,ape_paterno,ape_materno from t_empleado where id_empleado='$id_empleado'"));
?>          

        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
               
                
                   <nav aria-label="breadcrumb" role="navigation">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="../" title="Inicio"><i class="fa fa-home"></i> </a></li>
                        <li class="breadcrumb-item"><a href="../empleados" title="Atrás"><i class="fa fa-arrow-left"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span><?php echo $nom[0].' '.$nom[1].' '.$nom[2]?> : LEGAJO</span></li>
                      </ol>
                  </nav>
                       <div class="file"></div>  
                       <input type="hidden" name="id_e" id="id_e" value="<?=$id_empleado?>">
                       <div class="datos_ajax_register"></div>
                      <div class="outer_div2"></div>
                      <hr>
                      <div class="form-group mt-12" align="right">
                            <button type="button" class="btn btn-light" 
                            data-toggle="modal" 
                            data-target="#datafile" 
                            data-id_empleado="<?php echo ($id_empleado)?>" >  <i class='fa fa-plus-circle'></i> Agregar</button>
                            
                   </div>           
      </div>
    </div>
  </div>

<?php
  include_once($raiz.'class/footer.php');
?>   
<script src="js/file.js"></script>
<script>
    $(document).ready(function(){
     var id=$("#id_e").val();
       load(1,id);
        });
</script>  
