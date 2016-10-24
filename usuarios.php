<?php
  include("includes/conexion.php");
  session_start();
  $_SESSION['valueF'] = 'USUARIO';


?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Usuarios| LACE</title>
  <link rel="shortcut icon" href="img/icon.png">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>

</head>
<?php
if (!empty($_GET['u'])) {
    $u = $_GET['u'];  
    $_SESSION['pass']   =  $_GET['u'];
    include("includes/alert_usuarios.php");

    $con = mysqli_connect($host, $user, $pwd, $db);

  if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    }
/*Verifica si el campo busca esta vacio*/
    if(empty($_GET['u'])){
            $pac = ' ';
               $_SESSION['valueF'] = 'USUARIO';
          }

    else{
        $pac = $_GET['u'];  
               $_SESSION['valueF'] = 'USUARIOUP';
               $_SESSION['idup'] = $pac;
        }

        $sql = "SELECT *
                  FROM usuarios
                  WHERE idusuarios = '$pac'" ;

         $query  = mysqli_query($con, $sql);
         $fila   = mysqli_fetch_array($query, MYSQLI_ASSOC);
  }

?>
<body>

  <div id="wrapper">

    <span style="align: left;">
      <a href="menu.html">
       <img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
     </a>
     <h1>Usuarios</h1>
   </span>
   <form action="guarda.php" action="guarda.php" method="post" name="fus">

    <div class="col-3">
      <label>
        Nombre
        <input  name="nombre" tabindex="1" required value="<?php echo utf8_encode($fila['nombre']); ?>">
      </label>
    </div>
    <div class="col-3">
      <label>
        Dirección
        <input  name="direccion" tabindex="2" required value="<?php echo utf8_encode($fila['direccion']); ?>">
      </label>
    </div>

    <div class="col-3">
      <label>
        Telefono
        <input  name="telefono" tabindex="3" placeholder="(XXX) XXX XX XX" pattern="[0-9]*" value="<?php echo utf8_encode($fila['telefono']); ?>">
      </label>
    </div>
    <div class="col-3">
      <label>
        Nombre de Usuario
        <input name="user" tabindex="4" required value="<?php echo utf8_encode($fila['n_user']); ?>">
      </label>
    </div>
    <div class="col-3">
      <label>
        Contraseña
        <input  type="password" name="contraseña" id="contraseña" tabindex="5" required maxlength="20" minlength="6" value="<?php echo utf8_encode($fila['contrasena']); ?>">
      </div>
      <div class="col-3">
      <label>
        Repetir Contraseña
        <input  type="password" name="pass2" id="pass2" tabindex="5" required maxlength="20" minlength="6" value="<?php echo utf8_encode($fila['contrasena']); ?>">
      </div>

      <div class="col-3">
        <label>
          Email
          <input  name="email" tabindex="6" type="email" placeholder="nombre@dominio.com" value="<?php echo utf8_encode($fila['email']); ?>">
        </label>
      </div>


    <div class="col-submit">
      <button type="submit" class="submitbtn" >Guardar</button>
    </div>

  </form>

<script type="text/javascript">
var password, password2;

password = document.getElementById('contraseña');
password2 = document.getElementById('pass2');

password.onchange = password2.onkeyup = passwordMatch;

function passwordMatch() {
    if(password.value !== password2.value)
        password2.setCustomValidity('Las contraseñas no coinciden.');
    else
        password2.setCustomValidity('');
}
</script>
</body>
</html>
