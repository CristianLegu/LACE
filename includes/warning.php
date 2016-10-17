<?php
	include("includes/conexion.php");

	if(isset($_SESSION['valueF'])){
	}
?>
<html>
	<header>
		<script src="js/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	</header>

	<script type="text/javascript">
		
		swal({
		  title: "Paciente ya existe",
		  text: "¿Deseas guardar el paciente?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Si, guardar",
		  cancelButtonText: "No, cancelar y volver",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    swal({
		    		title: "Guardado", 
		    		text: "Paciente guadardado",
		    		type: "success"
		    	}, function(){
		    		<?php
		    			if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
						 	isset($_POST['direccion']) && !empty($_POST['direccion']) &&
						 	isset($_POST['ciudad']) && !empty($_POST['ciudad']) &&
							isset($_POST['estado']) && !empty($_POST['estado']) &&
							isset($_POST['dia']) && !empty($_POST['dia'])	&& 
							isset($_POST['mes']) && !empty($_POST['mes'])	&&
							isset($_POST['anio']) && !empty($_POST['anio'])
							)
						{
							$nombre 		= utf8_decode($_POST['nombre']);
							$direccion 		= utf8_decode($_POST['direccion']);
							$ciudad			= utf8_decode($_POST['ciudad']);
							$estado 		= utf8_decode($_POST['estado']);
							$cp 			= utf8_decode($_POST['cp']);
							$telefono		= utf8_decode($_POST['telefono']);
							$dia 			= utf8_decode($_POST['dia']);
							$mes 			= utf8_decode($_POST['mes']);
							$anio 			= utf8_decode($_POST['anio']);
							$email 			= utf8_decode($_POST['email']);
							$sangre			= utf8_decode($_POST['sangre']);

							$nacimiento		= $anio.'-'.$mes.'-'.$dia;

							$mysqli = mysqli_connect($host, $user, $pwd, $db);
							if (mysqli_connect_errno()) {
								echo "Falló la conexión:".mysqli_connect_error();
							}
							if (isset($_POST['onoffswitch']) && !empty($_POST['onoffswitch']))
							{
								$sexo = "M";
							}
							else
							{
								$sexo = "F";
							}

							$sql = "INSERT INTO pacientes (nombre, direccion, ciudad, estado, codigo_postal,
					        								 telefono, email, fecha_nac, sexo, tipo_sangre)
										VALUES('$nombre', '$direccion', '$ciudad', '$estado', '$cp',
												'$telefono', '$email', '$nacimiento', '$sexo', '$sangre');";

							if( mysqli_query($mysqli, $sql)){

							}else{
								echo "Error ".mysqli_error($mysqli);
							}

							mysqli_close($mysqli);



						
						}

		    		?>
		    		window.location.href = 'menu_pacientes.php';
		    	});
		  } else {
			    swal({
			    		title: "Cancelado",
			    		text: "",
			    		type: "error"
			    	}, function(){
			    		window.location.href = 'proveedores.php';
			    	});
		  }
		});

	</script>

</html>