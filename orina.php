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
  
  <h1>ANÁLISIS GENERAL DE ORINA</h1>
  <h3>EXÁMEN FÍSICO</h3>
  <form onsubmit="return false">
  <div class="col-4">
    <label>
      VOLUMEN
      <input>
    </label>
  </div>
  <div class="col-4">
    <label>
      COLOR
      <input>
    </label>
  </div>
  
  <div class="col-4">
    <label>
      OLOR
      <input>
    </label>
  </div>
  <div class="col-4">
    <label>
      ASPECTO
      <input>
    </label>
  </div>
  <div class="col-4">
    <label>
      SEDIMENTO
      <input>
    </label>
  </div>
  <div class="col-4">
    <label>
      DENSIDAD
      <input>
    </label>
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