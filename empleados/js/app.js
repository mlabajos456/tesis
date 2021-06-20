	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'lista.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
// procede a guardar los recien agregados nuevos

$( "#guardarDatos" ).submit(function( event ) {

	if($("#nom_empleado").val()==""|| $("#dni_empleado").val()==""|| 
	   $("#ape_paterno").val()==""|| $("#ape_materno").val()==""	
	 
	   ){
		 alert("Complete los campos obligatorios")
	}
	  
	else{
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "modelos/agregar.php",
					data: new FormData(this),
					contentType: false,
                    cache: false,
                    processData:false,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("<center><img src='../docs/images/load.gif' height='100' width='100'></center>");
						$("#btsubmit").attr("disabled", true);
					  },
					success: function(datos){
					$(".datos_ajax_register").html(datos);
					$("#datos_ajax_register").html("");
					$("#guardarDatos")[0].reset();
		            $("#btsubmit").attr("disabled", false);
					$('#dataRegister').modal('hide');
		            $('.modal-backdrop').hide();
		            showSwal('success-message');
					load(1);

				  }
			});
			}
		   event.preventDefault();

		});


//Guardar Files




// jala los datos para mostrar y modificar
		$('#dataUpdate').on('show.bs.modal', function (event) {

		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id_empleado= button.data('id_empleado') // Extraer la información de atributos de datos
		  var nom_empleado = button.data('nom_empleado') // Extraer la información de atributos de datos
		  var ape_paterno = button.data('ape_paterno')
		  var ape_materno = button.data('ape_materno')
		  var fecha_nacimiento = button.data('fecha_nacimiento')
		  var sexo = button.data('sexo')
		  var num_telefono = button.data('num_telefono')
		  var dni_empleado = button.data('dni_empleado')
		  var cargo = button.data('cargo')
		  var nro_cus = button.data('nro_cus')
		  var nro_cuenta = button.data('nro_cuenta')
		  var direccion = button.data('direccion')
		  var nro_empleado = button.data('nro_empleado')

		  var num_hijos =button.data('num_hijos')
		  var estado_civil =button.data('estado_civil')
		  var email =button.data('email')
		  var contacto =button.data('contacto')
		  var num_contacto =button.data('num_contacto')


		  var modal = $(this)
		  $("#actualidarDatos")[0].reset();
		  //modal.find('.modal-title').text('Modificar Departamento: '+nom_ciudad)
		   modal.find('.modal-body .div_corre').html('<h6>Nro: '+nro_empleado+'</h6>')
		  modal.find('.modal-body #id_empleado').val(id_empleado)
		  modal.find('.modal-body #nom_empleado').val(nom_empleado)
		  modal.find('.modal-body #ape_paterno').val(ape_paterno)
		  modal.find('.modal-body #ape_materno').val(ape_materno)
		  modal.find('.modal-body #fecha_nacimiento').val(fecha_nacimiento)
		  modal.find('.modal-body #sexo').val(sexo)
		  modal.find('.modal-body #dni_empleado').val(dni_empleado)
		  modal.find('.modal-body #num_telefono').val(num_telefono)
		  modal.find('.modal-body #cargo').val(cargo)
		  modal.find('.modal-body #nro_cus').val(nro_cus)
		  modal.find('.modal-body #nro_cuenta').val(nro_cuenta)
		  modal.find('.modal-body #direccion').val(direccion)


		  modal.find('.modal-body #num_hijos').val(num_hijos)
		  modal.find('.modal-body #e_civil').val(estado_civil)	
		  modal.find('.modal-body #email').val(email)		
		  modal.find('.modal-body #nom_contacto').val(contacto)
		  modal.find('.modal-body #num_contacto').val(num_contacto)
		 
		})


//Modificar los datos recientemente jalados
$( "#actualidarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "modelos/modificar.php",
					data: new FormData(this),
					contentType: false,
                    cache: false,
                    processData:false,
					 beforeSend: function(objeto){
						$(".datos_ajax_register").html("Mensaje: Cargando..."); 
					  },
					success: function(datos){
					$(".datos_ajax_register").html(datos);
					$("#dataUpdate").modal("hide");
					$('.modal-backdrop').hide();
					
					load(1);
				  }
			});

		  event.preventDefault();

		});

 (function($) {
      showSwal = function(type,id){  
        'use strict';
        if(type === 'swalEliminar'){
            swal({
              title: 'Está seguro de eliminar el registro?',
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

                load(1);

                  $('#dataDelete').modal('hide');
                  $('.modal-backdrop').hide();

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

//**********************************************************validar dni

$("#dni_empleado").keyup(function(dni){
   //alert($('input:radio[name=doc]:checked').val());
   var ruc = $('#dni_empleado').val();
   if(ruc==""|| ruc.length!=8 || $('input:radio[name=doc]:checked').val()==1){
       $("#dni_empleado").focus();
       $("#datos_ajax_register").html('');
       return false;

       }else{
       	 
            $("#datos_ajax_register").html("Mensaje: Cargando...");
            var url = '../reniec/consulta_reniec.php';

            $('.ajaxgif').removeClass('hide');
            $.ajax({
            type:'POST',
            url:url,
            dataType:'JSON',
            data:'dni='+ruc,
            success: function(datos_dni){
              $('.ajaxgif').addClass('hide');
              var datos = eval(datos_dni);
              if(datos[0]['nombre']==null){
                $("#datos_ajax_register").html("<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡ El servidor de Reniec está tardando en responder!</strong></div>");
             }
              else{
                if(datos[0]['nombre']==''){
                  $("#datos_ajax_register").html("<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡El DNI no se encuentra en los registros!</strong></div>");
                     $('#nom_empleado').val(datos[0]['nombre']);
                }else{
                    
                    $('#nom_empleado').val(datos[0]['nombre']);
                    $('#ape_paterno').val(datos[0]['paterno']);
                    $('#ape_materno').val(datos[0]['materno']);
                    $("#datos_ajax_register").html("<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡ DNI Encontrado!</strong></div>");
                    }  
               }
           }
           });
                  return false;

            }
    });

    $("input:radio[name=doc]").change(function () {    
        
        if ($('input:radio[name=doc]:checked').val()==1) {
        	 $('#div_validar').show();
        }else{
        	$('#div_validar').hide();
        }
    });

    $(function(){
		  $('#val_sunat').on('click', function(){
		   var ruc = $('#dni_empleado').val();
		   if(ruc==""){
		       $("#dni_empleado").focus();
		       return false;
		       }else{
		            $("#datos_ajax_register").html("Mensaje: Cargando...");
		            var url = '../sunatOnline/index2.php';

		            $('.ajaxgif').removeClass('hide');
		            $.ajax({
		            type:'GET',
		            url:url,
		            dataType:'JSON',
		            data:'documento='+ruc,
		            success: function(datos_dni){
		              $('.ajaxgif').addClass('hide');
		              var datos = eval(datos_dni);
		              var nada ='nada';
		              if(datos[0]==nada){
		                   $("#datos_ajax_register").html("<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡DNI o RUC no válido!</strong></div>");
		              }else{
		                  var texto =datos['RazSocial'];
		                  separador = "-";
		                  var  textoseparado = texto.split(separador);
		                  var name=textoseparado[1] ;
		                  $('#nom_empleado').val(name);
		                  $('#direccion').val(datos['Direccion']);
		                  $("#datos_ajax_register").html("<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡ RUC Encontrado!</strong></div>");
		                  }   
		           }
		           });
		                  return false;
		            }

		  });
});
     

