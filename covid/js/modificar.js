$(document).ready(function(){
        var id=$("#id_articulo").val();
       

            $.ajax({
                dataType: 'json',
                data: 'id=' + id,
                type: 'GET',
                url: 'get/dl_detalle.php',
                success: function(data) {


                        
                    var id_articulo = data[0]['id_articulo'];
                    var titulo = data[0]['titulo'];
                    var resumen = data[0]['resumen'];
                    var link_youtube = data[0]['link_youtube'];                                  
                    var enlace = data[0]['enlace'];
                    var id_autor = data[0]['id_autor'];
                    var p_1 = data[0]['p_1'];
                    var p_2 = data[0]['p_2'];
                    var p_3 = data[0]['p_3'];                  
                    var p_4 = data[0]['p_4'];
                    var p_5 = data[0]['p_5'];
                    var p_6 = data[0]['p_6'];
                    var id_categoria = data[0]['id_categoria'];
                    var descripcion = data[0]['descripcion'];
                    var nom_autor = data[0]['nom_autor'];
                    var imagen = data[0]['imagen'];
                    $("#titulo").val(titulo);
                    $("#resumen").val(resumen);
                    $("#link_youtube").val(link_youtube);
                    $("#enlace").val(enlace);
                    //$('#id_autor').val(id_autor);
                    //$('#id_categoria').val(id_categoria);
                 //   $(".div_img").html(img_empleado);
                  
                    $("#parrafo1").val(p_1);
                    $("#parrafo2").val(p_2);
                    $("#parrafo3").val(p_3);
                    $("#parrafo4").val(p_4);
                    $("#parrafo5").val(p_5);
                    $("#parrafo6").val(p_6);
                    $('<option value = "'+id_autor+'" seleted>'+nom_autor+'</option>').appendTo('#id_autor');
                    $('<option value = "'+id_categoria+'" seleted>'+descripcion+'</option>').appendTo('#id_categoria');
                  
                    
                }
            });
    });




       $(function (){     
       $("#guardar").click(function(){

          var detalle=document.getElementById("detalle"); 
/*        var detalle=$("#detalle").serialize();
        var par12=$("#par12_f").serialize();
        var par34=$("#par34_f").serialize();
        var par56=$("#par56_f").serialize();
      
        var datos=detalle+'&'+par34+'&'+par12+'&'+par56;       
        console.log(datos); */
        $.ajax({
                  type: "POST",
                  url:'modelos/modificar.php',
                  data: new FormData(detalle),
                    contentType: false,
                    cache: false,
                    processData:false,
               
                  beforeSend: function(objeto){
                     $("#datos_ajax_register").html("<center><img src='../docs/images/load.gif' height='100' width='100'></center>");
                   },
                  success:function(data){
                   showSwal('success-message');
                  $("#datos_ajax_register").html(data);
                  window.location='index.php';
              }
          })
       })
      }); 

function change_pic(img){
    $.ajax({
      type:'POST',
      url:'get_img.php',
      data: 'img='+img,
      success:function(data){
        $(".div_img").html(data);
        
      }
    })
}