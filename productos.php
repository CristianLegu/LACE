<?php
  include("includes/conexion.php");
  session_start();
  $_SESSION['valueF'] = 'PRODUCTOS';
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Productos | LACE</title>
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
     <h1>Productos</h1>
   </span>

   <form action="guarda.php" action="guarda.php" method="post">

    <div class="col-3">
      <label>
        Nombre Producto
        <input  name="producto" tabindex="1" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Cantidad
        <input  name="cantidad" tabindex="2" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Costo
        <input  name="Costo" tabindex="3" required>
      </label>
    </div>
    <div class="col-3">
      <label>
        Unidad de Medida
      <select tabindex="4">
        <option>Lts.</option>
        <option>M</option>
        <option>30-40 hrs per week</option>
      </select>
  </div>
  
      </label>
    </div>

    <div class="col-submit">
      <button type="submit" class="submitbtn">Guardar</button>
    </div>

  </form>

<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>
