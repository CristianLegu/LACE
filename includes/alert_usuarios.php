<?php

$pas = $_SESSION['pass'];
$con = mysqli_connect($host, $user, $pwd, $db);

  if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    }


        $sql = "SELECT 
                contrasena
              FROM usuarios
            WHERE idusuarios = $pas" ; 
   

         $query = $con -> query($sql);

        $fila = $query -> fetch_array();
        $pass = $fila['contrasena'];


?>
<html>
	<header>
		<script src="js/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	</header>

	<script type="text/javascript">

 	mivarJS=<?php echo "'".$pass."'" ?>;
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
			  else{
			  	
			  	if(inputValue == mivarJS){
			  		swal("Bien!", "", "success");	
			  	}
			  	else{
			  		swal.showInputError("Contraseña incorrecta!");
			  	}
			  }
     	  
			});
	</script>
</html>