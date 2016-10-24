<?php 
  include("includes/conexion.php");
  session_start();
  $_SESSION['valueA'] = 'CLINICA';
   $con = mysqli_connect($host, $user, $pwd, $db);
            if (mysqli_connect_errno()) {
          echo "Falló la conexión:".mysqli_connect_error();
              }   ?>
<!doctype html>
<html lang="en-US">
<head>
  <style>
  #section1{
  margin-left: 100px;
  margin-top: 80px;
  max-width: 850px;
}


}
  </style>
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

  <h1>QUIMICA CLINICA</h1>
  <form action="guarda_analisis.php" method="post" ALIGN=center>
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
      GLUCOSA
      <input name="glucosa" style="background-color:powderblue">
  </div>

  <div >
    <label  style="width: 25em;" >
      UREA
      <input name="urea" style="background-color:powderblue; ">
        </label>
  </div>
  <div >
    <label  style="width: 25em;" >
      CREATININA
      <input name="creatinina" style="background-color:powderblue; ">
        </label>
  </div>
  <div >
    <label   style="width: 25em;">
    ACIDO ÚRICO
      <input name="acido_urico" style="background-color:powderblue; ">
        </label>
  </div>
    <div >
  <label   style="width: 25em;">
    COLESTEROL TOTAL
    <input name="colesterol_tot" style="background-color:powderblue; ">
      </label>
</div>
<div >
<label   style="width: 25em;">
ESTERES DE COLESTEROL
<input name="esteres_col" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
LÍPIDOS TOTALES
<input name="lipidos_tot" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
TRIGLICÉRIDOS
<input name="trigliceridos" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
GLUCOSA POSTPRANDIAL
<input name="glucosa_post" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
PROTEÍNAS TOTALES
<input name="proteinas_tot" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
ALBÚMINAS
<input name="albuminas" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
GLOBULINAS
<input name="globulinas" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
RELACIÓN A/G
<input name="relacion_ag" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
TRANSAMINASA GO
<input name="transaminasa_go" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
TRANSAMINASA GP
<input name="transaminasa_gp" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
FOSFATASA ACISA
<input name="fosfatasa_acida" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
FOSFATASA ALCALINA
<input name="fosfatasa_alcalina" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
FOSFATASA PROSTÁTICA 
<input name="fosfatasa_prostatica" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
DEHIDROGENASA LÁCTICA
<input name="dehidrogenasa_lactica" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
BILLIRRUBINA DIRECTA
<input name="billi_directa" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
BILLIRRUBINA INDIRECTA
<input name="billi_indirecta" style="background-color:powderblue; ">
  </label>
</div>
<div >
<label   style="width: 25em;">
AMILASA
<input name="amilasa" style="background-color:powderblue; ">
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
