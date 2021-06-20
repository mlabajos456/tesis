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

	function cambiar(avatar,id){

			$.ajax({
			url:'modelos/avatar.php',
			data: 'avatar=' + avatar+ '&id='+id,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				alert('Avatar Actualizado');
				$("#loader").html("");
			}
		})

	}


	$( "#passupdate" ).submit(function( event ) {
		if($("#a_pass").val()==$("#pass").val()){
			if($("#n_pass").val()==$("#n2_pass").val()){
			
				var parametros = $(this).serialize();
				 $.ajax({
						type: "POST",
						url: "modelos/pass.php",
						data: new FormData(this),
						contentType: false,
	                    cache: false,
	                    processData:false,
						 beforeSend: function(objeto){
							$(".datos_ajax_register").html("Mensaje: Cargando..."); 
						  },
						success: function(datos){
						$(".datos_ajax_register").html(datos);
						alert('Contraseña Actualizada');
						window.location='../index.php';
					  }
			});
		}else{
			alert('La contraseña ingresada no coinciden');
			return false;
		}
		}else{
			alert('La contraseña actual no es correcta');
			return false;
		}

		

		  event.preventDefault();

		});