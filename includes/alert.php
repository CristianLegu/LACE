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
  				title: "Guardado",
   				text: "Guardado con éxito.",
    			type: "success"
  			}, function(){

							<?php 	  if(  $sesion == 'PROVEEDOR' or $sesion == 'PROVEEDORUP') { ?>
								window.location.href = 'menu_proveedores.php';

								<?php } 	  if(  $sesion == 'PRODUCTOS') { ?>
								window.location.href = 'menu_productos.php';
							<?php	} if (  $sesion == 'EMPLEADO' ) { ?>
								window.location.href = 'menu_empleados.php';
							<?php	} if (  $sesion == 'MEDICOS' or $sesion == 'MEDICOSUP') { ?>
								window.location.href = 'menu_medicos.php';
							<?php	} if (  $sesion == 'PACIENTES' OR $sesion == 'PACIENTESUP' ) { ?>
								window.location.href = 'menu_pacientes.php';
							<?php	} if (  $sesion == 'USUARIO'  or $sesion == 'USUARIOUP' ) { ?>
								window.location.href = 'menu_usuarios.php';
							

							<?php	} 


							?>

				}
			);
	</script>

</html>