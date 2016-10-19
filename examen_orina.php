<?php 
  include("includes/conexion.php");
  session_start();
  $_SESSION['valueA'] = 'ORINA';
   $con = mysqli_connect($host, $user, $pwd, $db);
            if (mysqli_connect_errno()) {
          echo "Falló la conexión:".mysqli_connect_error();
              }   ?>
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
    <span style="align: left;">
<a href="menu.html">
  <img src="img/logo2.png"  style="width: 15%; margin-left: 40px; ">
</a>
</span>
  <h1>ANÁLISIS GENERAL DE ORINA</h1>
  <h3>EXÁMEN FÍSICO</h3>
  <form action="guarda_analisis.php" method="post" ALIGN=center >
<div>
<label style="width: 17em;" >Medico</label>
</div>
<div> 
 <select id="idmedico"  name="idmedico" style="width: 20em;">
        <option  value="0">Seleccionar</option>
        <?php
                  
          $query = $con -> query ("SELECT idmedicos, nombre FROM medicos");
                      
          while ($valores = mysqli_fetch_array($query)) {                        
            echo '<option value="'.$valores[idmedicos].'">'.$valores[nombre].'</option>';

          }
        ?>
      </select>
      
   </div >


  <div >
    <label style="width: 25em;">
      VOLUMEN
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      COLOR
      <input name="color" style="background-color:powderblue; ">
    </label >
  </div>

  <div >
    <label style="width: 25em;">
      OLOR
      <input name="color" style="background-color:powderblue; "> 
    </label>
  </div>
  <div >
    <label style="width: 25em;"> 
      ASPECTO
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      SEDIMENTO
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      DENSIDAD
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>


 <div >
   <LABEL style="width: 75em;"> <h3>EXÁMEN QUÍMICO </h3></LABEL>
  </div>
     <div >
    <label style="width: 25em;">
      PH
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      PROTEÍNAS
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>

  <div >
    <label style="width: 25em;">
   GLUCOSA
      <input style="background-color:powderblue; ">
    </label>
  </div>
 

  <div >
    <label style="width: 25em;">
     CETONA
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      BILLIRRUBINA
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>

  <div >
    <label style="width: 25em;">
   SANGRE
      <input style="background-color:powderblue; ">
    </label>
  </div>




  <div >
    <label style="width: 25em;">
      NITRITOS
      <input style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
    UROBILINÓGENO
      <input style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      SÓLIDOS TOTALES
      <input style="background-color:powderblue; ">
    </label>
  </div>
 

<div >
   <LABEL style="width: 75em;"> <h3>EXÁMEN MICROSCOPICO </h3></LABEL>
  </div>
  <div  >
    <label style="width: 70em;">
      SEDIMIENTO
      <input style="background-color:powderblue; ">
    </label>
  </div>

<div class="col-submit">
  <button class="submitbtn">GUARDAR</button>
</div>
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
