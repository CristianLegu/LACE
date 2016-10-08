<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Proveedores - LACE</title>
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
	<h1>M&eacute;dicos</h1>
</span>
   
  <form onsubmit="return false">

  <div class="col-2">
    <label>
      Nombre
      <input  name="nombre" tabindex="1">
    </label>
  </div>
 <div class="col-2">
    <label>
      Domicilio
      <input  name="domicilio" tabindex="3">
    </label>
  </div>
  <div class="col-3">
    <label>
      Ciudad
      <input  name="ciudad" tabindex="3">
    </label>
  </div>
  <div class="col-3">
    <label>
      Estado
      <input  name="estado" tabindex="4">
    </label>
  </div>
  <div class="col-3">
    <label>
      Teléfono
       <input  name="telefono" tabindex="5">
  </div>
  
  <div class="col-2">
    <label>
      Hospital
      <input  name="web" tabindex="6">
    </label>
  </div>
  <div class="col-2">
    <label>
      Domicilio Hospital
      <input  name="mail" tabindex="7">
    </label>
  </div>
  
  <div class="col-submit">
    <button class="submitbtn">Guardar</button>
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