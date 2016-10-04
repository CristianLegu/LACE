<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>ANÁLISIS GENERAL DE ORINA</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
</head>

<body>
  <div id="wrapper">

  <h1>EXÁMEN DE HECES</h1>
  <h3>CARACTERÍSTICAS MACROSCÓPICAS</h3>
  <form onsubmit="return false">
  <div class="col-3">
    <label>
      COLOR
      <input>
    </label>
  </div>
  <div class="col-3">
    <label>
      CONSISTENCIA
      <input>
    </label>
  </div>

  <div class="col-3">
    <label>
      MOCO
      <input>
    </label>
  </div>
  <div class="col-2">
    <label>
      PUS
      <input>
    </label>
  </div>
  <div class="col-2">
    <label>
      SANGRE FRESCA
      <input>
    </label>
  </div>
</form>
  <h3>PARÁSITOS ENCONTRADOS</h3>
<form onsubmit="return false">
  <div class="col-3">
    <label>
      PRIMERA MUESTRA
      <input>
    </label>
  </div>
  <div class="col-3">
    <label>
      SEGUNDA MUESTRA
      <input>
    </label>
  </div>
  <div class="col-3">
    <label>
      TERCERA MUESTRA
      <input>
    </label>
  </div>
</div>
  <div class="col-submit">
    <button class="submitbtn">GUARDAR</button>
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
