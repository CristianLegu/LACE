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
  <title>Usuarios- LACE</title>
  <link rel="shortcut icon" href="img/icon.png">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>

</head>

<body>

  <div id="wrapper">

    <span style="align: left;">
      <a href="menu.html">
       <img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
     </a>
     <h1>Usuarios</h1>
   </span>

   <form action="guarda.php" method="post">

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
        <input  name="telefono" tabindex="3" >
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
        <input  type="password" name="contraseña" tabindex="5" required>
      </div>

      <div class="col-3">
        <label>
          Email
          <input  name="email" tabindex="6" type="tel">
        </label>
      </div>


    <div class="col-submit">
      <button type="submit" class="submitbtn">Guardar</button>
    </div>

  </form>
</div>
<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>
