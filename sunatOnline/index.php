<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Consulta Reniec</title>

	<script src="js/jquery.min.js"></script>
</head>

<body>

	<form method="post">
		<input type="text" class="dni" id="dni" name="dni">
		<button id="botoncito" class="botoncito">Enviar</button>
	</form>

	<div id="mostrar_dni">Aqui se mostrara el dni Consultado</div>
	<div>Direccion: <span id="paterno"></span></div>
	<div>Estado: <span id="materno"></span></div>
	<!--<div>NOMBRES COMPLETOS: <span id="nombres"></span></div>-->

	<script>
		$(function() {
			$('#botoncito').on('click', function() {
				var dni = $('#dni').val();
				var url = 'index2.php';
				$.ajax({
					type: 'GET',
					url: url,
					dataType: 'JSON',
					data: 'documento=' + dni,
					success: function(datos_dni) {
						var datos = eval(datos_dni);

						$('#mostrar_dni').text(datos['RazSocial']);
						$('#paterno').text(datos['Direccion']);
						$('#materno').text(datos['Estado']);
						//$('#nombres').text(datos[0]['nombre']);
					}
				});
				return false;
			});
		});
	</script>

</body>

</html>