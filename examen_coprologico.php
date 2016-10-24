<?php 
  include("includes/conexion.php");
  session_start();
  $_SESSION['valueA'] = 'COPROLOGICO';
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
  <h1>COPROLOGICO</h1>

    <h3>EXÁMEN MACROSCOPICO</h3>

  <form method="post" action="guarda_analisis.php" >
 <div >
      <label style="width: 25em;" >
      Médico

    </div>
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


    </div>    
    <div >
      <label style="width: 25em;" >


    </div>
    <div >
      <label style="width: 25em;" ALIGN=center>
        PRIMERA

    </div>
    <div >
      <label style="width: 25em;" ALIGN=center >
        SEGUNDA

    </div>
  <div >
    <label style="width: 25em;" >
      COLOR

  </div>
  <div >
    <label style="width: 25em;" >
    <input name="color_pri" style="background-color:powderblue;" >

  </div>
  <div >


  <label style="width: 25em; " >
  <input name="color_seg" style="background-color:powderblue; ">
</div>


<div >
<label style="width: 25em;" >
  MOCO

</div>
<div >
<label style="width: 25em;" >
<input name="moco_pri" style="background-color:powderblue; ">

</div>
<div >

<label style="width: 25em; " >
<input name="moco_seg" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 25em;" >
  PUS

</div>
<div >
<label style="width: 25em;" >
<input name="pus_pri" style="background-color:powderblue;">

</div>
<div >


<label style="width: 25em; " >
<input name="pus_seg" style="background-color:powderblue; " >
</div>
<div >
<label style="width: 25em;" >
  CONSISTENCIA

</div>
<div >
<label style="width: 25em;" >
<input name="consistencia_pri" style="background-color:powderblue; ">

</div>

<div >
<label style="width: 25em; " >
<input name="consistencia_seg" style="background-color:powderblue; ">
</div>
<div >
<label style="width: 25em;" >
SANGRE FRESCA

</div>
<div >
<label style="width: 25em;" >
<input name="sangre_pri" style="background-color:powderblue; ">

</div>
<div >


<label style="width: 25em; " >
<input name="sangre_seg" style="background-color:powderblue; ">
</div>

<div >
<label style="width: 25em;" >
  RESIDUOS ALIMENTICIOS

</div>
<div >
<label style="width: 25em;" >
<input name="residuos_pri" style="background-color:powderblue; ">

</div>
<div >


<label style="width: 25em; " >
<input name="residuos_seg" style="background-color:powderblue;">
</div>



<div >
   <LABEL style="width: 100em;" > <h3 >EXÁMEN QUIMICO</h3></LABEL>
  </div>
  <div >
    <label style="width: 25em;" >


  </div>
  <div >
    <label style="width: 25em;" ALIGN=center>
      PRIMERA

  </div>
  <div >
    <label style="width: 25em;" ALIGN=center >
      SEGUNDA

  </div>
<div>
  <label style="width: 25em;" >
    PH

</div>
<div >
  <label style="width: 25em;" >
  <input style="background-color:powderblue; " name="ph_pri">

</div>
<div >


<label style="width: 25em; " >
<input style="background-color:powderblue; " name="ph_seg">
</div>


<div >
<label style="width: 25em;" >
BILLIRRUBINAS

</div>
<div >
<label style="width: 25em;" >
<input style="background-color:powderblue; " name="billi_pri">

</div>
<div >

<label style="width: 25em; " >
<input style="background-color:powderblue; " name="billi_seg">
</div>
<div >
<label style="width: 25em;" >
UROBILLINÓGENO

</div>
<div >
<label style="width: 25em;" >
<input style="background-color:powderblue; " name="uro_pri">

</div>
<div >


<label style="width: 25em; " >
<input style="background-color:powderblue; " name="uro_seg">
</div>
<div >
<label style="width: 25em;" >
SANGRE OCULTA

</div>
<div >
<label style="width: 25em;" >
<input style="background-color:powderblue; " name="sang_oculta_pri">

</div>

<div >
<label style="width: 25em; " >
<input style="background-color:powderblue; " name="sang_oculta_seg">
</div>
<div >
<label style="width: 25em;" >
AZÚCARES

</div>
<div >
<label style="width: 25em;" >
<input style="background-color:powderblue; " name="azucares_pri">

</div>
<div >


<label style="width: 25em; " >
<input style="background-color:powderblue; " name="azucares_seg">
</div>

<div >
<label style="width: 25em;" >
REDUCTORES

</div>
<div >
<label style="width: 25em;" >
<input style="background-color:powderblue; " name="reductores_pri">

</div>
<div >


<label style="width: 25em; " >
<input style="background-color:powderblue; " name="reductores_seg">
</div>

<div >
<label style="width: 25em;" >
EXAMEN MICROSCOPICO

</div>
<div >
<label style="width: 50em; " >
<input style="background-color:powderblue; " name="ex_micros">
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
