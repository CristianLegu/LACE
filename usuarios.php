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
    include("includes/alert_usuarios.php");
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
        <input  name="nombre" tabindex="1" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Dirección
        <input  name="direccion" tabindex="2" required>
      </label>
    </div>

    <div class="col-3">
      <label>
        Telefono
        <input  name="telefono" tabindex="3" placeholder="(XXX) XXX XX XX" pattern="[0-9]*" >
      </label>
    </div>
    <div class="col-3">
      <label>
        Nombre de Usuario
        <input name="user" tabindex="4" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Contraseña
        <input  type="password" name="contraseña" id="contraseña" tabindex="5" required maxlength="20" minlength="6">
      </div>
      <div class="col-3">
      <label>
        Repetir Contraseña
        <input  type="password" name="pass2" id="pass2" tabindex="5" required maxlength="20" minlength="6">
      </div>

      <div class="col-3">
        <label>
          Email
          <input  name="email" tabindex="6" type="email" placeholder="nombre@dominio.com" >
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
