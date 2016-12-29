<?php
	include("includes/conexion.php");

	if(isset($_SESSION['valueF'])){
	}
$mensaje = 'No ha iniciado sesión';
?>
<html>
<head>
	  <meta charset="utf-8">
</head>
	<header>
		<script src="js/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
		
	</header>

	<script type="text/javascript">

			swal({
  				title: "Error",
   				text: "<?php echo $mensaje; ?> ",  
    			type: "warning"
  			}, function(){
						window.location.href = 'index.php';
				
				}
			);
	</script>

</html>