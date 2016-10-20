<?php
?>
<html>
	<header>
		<script src="js/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	</header>

	<script type="text/javascript">

						swal({
			  title: "Confirma tu contraseña!",
			  text: "",
			  type: "input",
			  showCancelButton: true,
			  closeOnConfirm: false,
			  animation: "slide-from-top",
			  inputPlaceholder: "Contraseña",
			  inputType: "password"
			},
			function(inputValue){
			  if (inputValue === false){
			  	window.location.href = 'menu_usuarios.php';
			  } 
			  
			  if (inputValue === "") {
			    swal.showInputError("El campo está vacío!");
			    return false
			  }
			  
			  swal("Nice!", "You wrote: " + inputValue, "Bienvenido");
			});
	</script>
<?php
$pass = "<script> document.write(inputValue) </script>";
echo $pass;
?>
</html>