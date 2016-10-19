<?php
  include("includes/conexion.php");
  session_start();
  $_SESSION['valueA'] = 'HECES';

?>
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
  <h1>EXÁMEN DE HECES</h1>
  <h3>CARACTERÍSTICAS MACROSCÓPICAS</h3>
  <form  action="guarda_analisis.php" method="post" ALIGN=center>
<div>
<label>Medico</label>
</div>
<div> 
 <select id="idmedico"  name="idmedico" >
        <option  value="0">Seleccionar</option>
        <?php
              $con = mysqli_connect($host, $user, $pwd, $db);
            if (mysqli_connect_errno()) {
          echo "Falló la conexión:".mysqli_connect_error();
              }       
          $query = $con -> query ("SELECT idmedicos, nombre FROM medicos");
                      
          while ($valores = mysqli_fetch_array($query)) {                        
            echo '<option value="'.$valores[idmedicos].'">'.$valores[nombre].'</option>';

          }
        ?>
      </select>
      
   </div >
<div>
<label>Paciente</label>
</div>   
    <div> 
 <select id="idpaciente"  name="idpaciente" >
        <option  value="0">Seleccionar</option>
        <?php
              $con = mysqli_connect($host, $user, $pwd, $db);
            if (mysqli_connect_errno()) {
          echo "Falló la conexión:".mysqli_connect_error();
              }       
          $query = $con -> query ("SELECT idpacientes, nombre FROM pacientes");
                      
          while ($valores = mysqli_fetch_array($query)) {                        
            echo '<option value="'.$valores[idpacientes].'">'.$valores[nombre].'</option>';

          }
        ?>
      </select>
      
   </div >         
  <div >
    <label style="width: 25em;">
      COLOR
      <input name="color" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      CONSISTENCIA
      <input name="consistencia" style="background-color:powderblue; ">
    </label>
  </div>

  <div >
    <label style="width: 25em;">
      MOCO
      <input name="moco" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      PUS
      <input name="pus" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      SANGRE FRESCA
      <input name="sangre_fresca" style="background-color:powderblue; ">
    </label>
  </div>

<div >
   <LABEL style="width: 75em;"> <h3>PARÁSITOS ENCONTRADOS </h3></LABEL>
  </div>
 
  <div >
    <label style="width: 25em;">
      PRIMERA MUESTRA
      <input name="para_pri_muestra" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;">
      SEGUNDA MUESTRA
      <input name="para_seg_muestra" style="background-color:powderblue; ">
    </label>
  </div>
  <div >
    <label style="width: 25em;" >
      TERCERA MUESTRA
      <input style="background-color:powderblue; ">
    </label>
  </div>

  <div class="col-submit">
    <button class="submitbtn">GUARDAR</button>
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
