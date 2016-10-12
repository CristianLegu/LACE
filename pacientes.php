<?php
  include("includes/conexion.php");
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Pacientes - LACE</title>
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
     <h1>Pacientes</h1>
   </span>

   <form action="guarda.php" method="post">

    <div class="col-2">
      <label>
        Nombre
        <input  name="nombre" tabindex="1" required>
      </label>
    </div>
    <div class="col-2">
      <label>
        Dirección
        <input  name="direccion" tabindex="2" required>
      </label>
    </div>

    <div class="col-3">
      <label>
        Ciudad
        <input  name="ciudad" tabindex="3" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Estado
        <input name="estado" tabindex="4" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Código Postal
        <input  name="cp" tabindex="5">
      </div>

      <div class="col-4">
        <label>
          Teléfono
          <input  name="telefono" tabindex="6" type="tel"  placeholder="(XXX) XXX XX XX">
        </label>
      </div>
      <div class="col-4">
        <label>
          Fecha de Nacimiento
          <input  name="nacimiento" tabindex="7" required>
        </label>
      </div>
      <div class="col-2">
        <label>
          Email
          <input  name="email" tabindex="8">
        </label>
      </div>
      <div class="col-2">
       <label>Sexo</label>
         <center  style="position:relative; margin-bottom:8px">
            <div class="onoffswitch">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
              <label class="onoffswitch-label" for="myonoffswitch">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </center>
      </div>
     <div class="col-2">
      <label>
        Tipo de sangre 
        <input  name="sangre" tabindex="9">
      </label>
    </div>
   <?php
      session_start();
      $_SESSION['valueF'] = 'PACIENTES';
    ?>

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
