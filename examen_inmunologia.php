<?php 
  include("includes/conexion.php");
  session_start();
  $_SESSION['valueA'] = 'INMUNOLOGIA';
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



  <h1>INMUNOLOGÍA</h1>

  <form action="guarda_analisis.php" method="post" ALIGN=center>
  <div >
      <label style="width: 35em;" >
      Médico

    </div>
<div >
      <label style="width: 5em;" >


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
      <label style="width: 5em;" >


    </div>
    <div >
      <label style="width: 35em;" >
      R. FEBRILES:
        <input style="background-color:powderblue" name="r_febriles">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
      PERFIL REUMATICO:
        <input style="background-color:powderblue" name="p_reumatico_globu">
         </label>
    </div>

    <div >
      <label style="width: 35em;" >
      R. DE WIDAL:
        <input style="background-color:powderblue" name="r_widal">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
      VEL. SED. GLOBULAR
        <input style="background-color:powderblue" name="p_glubular">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    TÍFICO O
        <input style="background-color:powderblue" name="r_widal_tifico_o">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
      ANTIESTREOTILISINAS
        <input style="background-color:powderblue" name="p_r_antiestreo">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    TÍFICO H
        <input style="background-color:powderblue" name="r_widal_tifico_h">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PROTEÍNAS C REACTICA
        <input style="background-color:powderblue" name="p_r_proteinas_reactica">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PARATÍFICO A
        <input style="background-color:powderblue" name="r_widal_paratifico_a">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    FACTOR REUMATOIDE
        <input style="background-color:powderblue" name="p_r_reumatoide">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PARATÍFICO B
        <input style="background-color:powderblue" 
        name="r_widal_paratifico_b">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    ACIDO URICO
        <input style="background-color:powderblue" name="p_r_acido_urico">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
  R. DE HUDDLESON
 </label>
    </div>
    <div >
      <label style="width: 35em;" >
    P. DE AGLUTACIÓN CASTAÑEDA
     </label>
    </div>
    <div >
      <label style="width: 35em;" >
    BRUCELLA ABORTUS
        <input style="background-color:powderblue" name="r_hudd_brucella">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    SALMONELLA
        <input style="background-color:powderblue" name="p_aglu_salmonella">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    R. DE WEIL FELIX
        <input style="background-color:powderblue" name="r_weil_felix">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    BRUCELLA
        <input style="background-color:powderblue" name="p_aglu_brucella">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PROTEUS OX-19
        <input style="background-color:powderblue" name="r_weil_proteus_ox19">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PROTEUS OX-19
        <input style="background-color:powderblue" name="p_proteus_ox19">
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