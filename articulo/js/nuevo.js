
    $(function (){     
       $("#guardar").click(function(){

         var detalle=document.getElementById("detalle"); 
    
         
        
         var datos= new FormData(detalle);
      
        $.ajax({
                  type: "POST",
                  url:'modelos/agregar.php',
                  data: datos,
                  contentType: false,
                  cache: false,
                  processData:false,
                  beforeSend: function(objeto){
                     $("#datos_ajax_register").html("<center><img src='../docs/images/load.gif' height='100' width='100'></center>");
                   },
                  success:function(data){
                    var id=data;
                    var markup = $('#summernoteExample').summernote('code');
                            $.ajax({
                                  type: "POST",
                                  url:'modelos/agregar_contenido.php',
                                  data: 'contenido='+markup+'&id='+id,
                                  
                                  beforeSend: function(objeto){
                                     $("#datos_ajax_register").html("<center><img src='../docs/images/load.gif' height='100' width='100'></center>");
                                   },
                                  success:function(data){
                                   
                                   showSwal('success-message');
                                  $("#datos_ajax_register").html(data);
                                  window.location='index.php';
                              }
                          })
              }
          })
       })
      }); 


     $(function (){     
       $("#actualizar").click(function(){

         var detalle=document.getElementById("detalle"); 
    
         
        
         var datos= new FormData(detalle);
         var id_articulo= $("#id_articulo").val();
      
        $.ajax({
                  type: "POST",
                  url:'modelos/modificar.php',
                  data: datos,
                  contentType: false,
                  cache: false,
                  processData:false,
                  beforeSend: function(objeto){
                     $("#datos_ajax_register").html("<center><img src='../docs/images/load.gif' height='100' width='100'></center>");
                   },
                  success:function(data){
                    var id=data;
                    var markup = $('#summernoteExample').summernote('code');
                            $.ajax({
                                  type: "POST",
                                  url:'modelos/agregar_contenido.php',
                                  data: 'contenido='+markup+'&id='+id_articulo,
                                  
                                  beforeSend: function(objeto){
                                     $("#datos_ajax_register").html("<center><img src='../docs/images/load.gif' height='100' width='100'></center>");
                                   },
                                  success:function(data){
                                   
                                   showSwal('success-message');
                                  $("#datos_ajax_register").html(data);
                                  window.location='index.php';
                              }
                          })
              }
          })
       })
      }); 


/******************************************************************************************************************************************************/

     (function($) {
      showSwal = function(type,id){  
        'use strict';
        if(type === 'swalEliminar'){
            swal({
              title: 'Está seguro de eliminar el registro del articulo?',
              text: "El registro se eliminará permanentemente!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si'
            }).then(function () {
              $.ajax({
                type: "POST",
                url: "modelos/eliminar.php",
                data: 'id='+id,
                 beforeSend: function(objeto){
                  $(".datos_ajax_register").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                $(".datos_ajax_register").html(datos);

                load(1,0);

                  $('#dataDelete').modal('hide');
                  $('.modal-backdrop').hide();
                  window.location='index.php';
                       }

               });
          })

      }else if(type === 'success-message'){
          swal(
              'Tarea Exitosa!',
              'Datos registrados!',
              'success'
          )

      }
    }
 })(jQuery);