	function load(page,id){
		var parametros = {"action":"ajax","page":page,"id_empleado":id};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'lista_l.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div2").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
$('#datafile').on('show.bs.modal', function (event) {

		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id= button.data('id_empleado') // Extraer la información de atributos de datos
		
		  var modal = $(this)
		  $("#guardarfile")[0].reset();
		  modal.find('.modal-body #id_empleado').val(id)
		  //modal.find('.modal-body #nom_legajo').val(id)
		  })



$( "#guardarfile" ).submit(function( event ) {
	if($("#nom_legajo").val()==""||$("#id_empleado").val()==""){
	  	
	 alert("Ingrese el nombre del Archivo")
	}else{
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "modelos/file.php",
					data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
					 beforeSend: function(objeto){
						$("#file").html("<center><img src='../docs/images/load.gif' height='100' width='100'></center>");
						
						$("#completar").attr("disabled", true);
					  },
					success: function(datos){
					//$(".file").html(datos);	
					$("#file").html("");
					$("#guardarfile")[0].reset();
		            $("#completar").attr("disabled", false);
					$('#datafile').modal('hide');
		            $('.modal-backdrop').hide();
		            showToastPosition('bottom-right','Archivo Subido!','El documento se cargó con éxito','success');
		            var id=$("#id_e").val();
                    load(1,id);
				
					}
			});
		   event.preventDefault();
   }
		});

 (function($) {
      showSwal2 = function(type,id){  
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
                url: "modelos/eliminar_legajo.php",
                data: 'id='+id,
                 beforeSend: function(objeto){
                  $(".datos_ajax_register").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                $(".datos_ajax_register").html(datos);
var id=$("#id_e").val();
                load(1,id);

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
 		load(1);
    	}
    }
 })(jQuery);
