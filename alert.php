<?php
	include("includes/conexion.php");
	session_start();
	if(isset($_SESSION['guarda'])){
		 $Variable = $_SESSION['guarda'];
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
		<?php	if ( $Variable == 'P' ) { ?>
		window.location.href = 'proveedores.php';
		session_destroy();
<?	} ?>
<?php	if ( $Variable == 'M' ) { ?>
window.location.href = 'menu_pacientes.php';
session_destroy();
<?	} ?>
  });
	</script>

</html>
