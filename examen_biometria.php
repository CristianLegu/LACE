<?php 
  include("includes/conexion.php");
  session_start();
  $_SESSION['valueA'] = 'BIOMETRIA';
   $con = mysqli_connect($host, $user, $pwd, $db);
            if (mysqli_connect_errno()) {
          echo "Falló la conexión:".mysqli_connect_error();
              }   ?>
<!doctype html>
<html lang="en-US">
<head>

  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Biometría Hemática|LACE</title>
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
    </span>

  <h1>BIOMETRIA HEMATICA</h1>

  
    <h3>FORMULA ROJA</h3>
  <form action="guarda_analisis.php" ALIGN=center >
<div> 
 <select id="idmedico"  name="idmedico" style="width: 25em;">
        <option  value="0">Seleccionar Médico</option>
        <?php
                  
          $query = $con -> query ("SELECT idmedicos, nombre FROM medicos");
                      
          while ($valores = mysqli_fetch_array($query)) {                        
            echo '<option value="'.$valores[idmedicos].'">'.$valores[nombre].'</option>';

          }
        ?>
      </select>
      
   </div >
  <div >
    <label style="width: 25em;" > 
      ERITROCITOS MILL/MM3
      <input  name="eritrocitos"  style="background-color:powderblue" name="eritrocitos">

  </div>
  <div >
    <label  style="width: 25em;">
      HEMOGLOBINA EN GR. %
      <input name="hemoglobina" style="background-color:powderblue; " name="hemoglobina">
        </label>
  </div>
  <div >
    <label  style="width: 25em;">
      HEMATOCRITO EN %
      <input name="hematocrito" style="background-color:powderblue; ">
        </label>
  </div>
  <div >
    <label   style="width: 25em;">
      H.G.M. UG.
      <input name="h_g_m" style="background-color:powderblue; ">
        </label>
  </div>
    <div >
  <label   style="width: 25em;">
    V.G.M. MICRA3
    <input name="v_g_m" style="background-color:powderblue; ">
      </label>
</div>
<div >
<label   style="width: 25em;">
C.H.G.M %
<input name="c_h_g_m" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
PLAQUETAS
<input name="plaquetas" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
ANOMALÍAS ERITOCÍTICAS
<input name="anomalias_eritrociticas" style="background-color:powderblue; ">
  </label>
</div>

 <div >
   <LABEL style="width: 75em;"> <h3>FORMULA BLANCA</h3></LABEL>
  </div>

 <div >
  <label  style="width: 25em;"  >
    LEUCOCITOS POR MM3

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="neotrofilos" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >

</div>
<div >
<label style="width: 25em;"  >
</div>
  
<div>
  <label  style="width: 25em;" >
    NEOTRÓFILOS TOTALES

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="neotrofilos" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    SEGMENTADOS

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="segmentados" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    EN BANDA

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="en_banda" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    JUVENILES

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="juveniles" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    MIELECITOS

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="mielecitos" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    LINFOCITOS

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="linfocitos" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    MONOCITOS

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="monocitos" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    EOSINÓFILOS

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="eosinofilos" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    BASÓFILOS

      </label>
</div>
<div >
<label style="width: 25em;"  >
<input name="basofilos" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 5em;"  >
%
</div>
<div >
<label style="width: 25em;"  >
<input style="background-color:powderblue; ">
</div>
<div>
  <label  style="width: 25em;">
    ANOMALIAS LEUCOCITARIAS

      </label>
</div>
<div >
<label style="width: 55em;"   >
<input name="anomalias" style="background-color:powderblue; ">
</div>

<div class="col-submit">
  <button class="submitbtn">GUARDAR</button>

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
