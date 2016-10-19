
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

<form   method="POST" ALIGN=center>
<div>
<label>Medico</label>
</div>
<div>
  <select id="selectMed" name="selectMed" onchange="submit()">
                 <option value="" selected>Seleccionar</option>
       <?php
         include("includes/conexion.php");
           $con = mysqli_connect($host, $user, $pwd, $db);
            if (mysqli_connect_errno()) {
          echo "Falló la conexión:".mysqli_connect_error();
              }
              else{
                    $sql = "SELECT *
                             FROM medicos " ;

              $query  = mysqli_query($con, $sql);


               while ($fila=mysqli_fetch_array($query)){
          
                         echo "<option value= '".$fila[0]."' ";
                        if($_POST['selectMed']==$fila[0])
                         echo "SELECTED ";
                         echo ">";
                         echo $fila[1];
                         echo "</option>";
                         }
                  }
                ?>
</select>
   </div >

  <div>
<label>Paciente</label>
</div>
<div>
  <select id="selectPac" name="selectPac" onchange="submit()">
                 <option value="" selected>Seleccionar</option>
       <?php
         include("includes/conexion.php");
           $con = mysqli_connect($host, $user, $pwd, $db);
            if (mysqli_connect_errno()) {
          echo "Falló la conexión:".mysqli_connect_error();
              }
              else{
                    $sql = "SELECT *
                             FROM pacientes " ;

              $query  = mysqli_query($con, $sql);


               while ($fila=mysqli_fetch_array($query)){
          
                         echo "<option value= '".$fila[0]."' ";
                        if($_POST['selectPac']==$fila[0])
                         echo "SELECTED ";
                         echo ">";
                         echo $fila[1];
                         echo "</option>";
                         }
                  }
                ?>
</select>
   </div >
  </form>

  <h1>INMUNOLOGÍA</h1>

  <form action="guarda.php" method="post" ALIGN=center>
    <div >
      <label style="width: 35em;" >
      R. FEBRILES:
        <input style="background-color:powderblue" name="r_febriles">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
      PERFIL REUMATICO:
        <input style="background-color:powderblue" name="reumatico">
         </label>
    </div>

    <div >
      <label style="width: 35em;" >
      R. DE WIDAL:
        <input style="background-color:powderblue" name="widal">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
      VEL. SED. GLOBULAR
        <input style="background-color:powderblue" name="globular">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    TÍFICO O
        <input style="background-color:powderblue" name="r_tifico_o">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
      ANTIESTREOTILISINAS
        <input style="background-color:powderblue" name="antiestrotilisinas">
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
        <input style="background-color:powderblue" name="proteinas">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PARATÍFICO A
        <input style="background-color:powderblue" name="pr_widal_para_a">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    FACTOR REUMATOIDE
        <input style="background-color:powderblue" name="p_r_reuma">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PARATÍFICO B
        <input style="background-color:powderblue" 
        name="pr_widal_para_b">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    ACIDO URICO
        <input style="background-color:powderblue" name="p_r_urico">
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
        <input style="background-color:powderblue" name="brucellaabortus">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    SALMONELLA
        <input style="background-color:powderblue" name="p_aglu_salmo">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    R. DE WEIL FELIX
        <input style="background-color:powderblue" name="felix">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    BRUCELLA
        <input style="background-color:powderblue" name="brucella">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PROTEUS OX-191
        <input style="background-color:powderblue" name="proteusHUDDLESON">
         </label>
    </div>
    <div >
      <label style="width: 35em;" >
    PROTEUS OX-19
        <input style="background-color:powderblue" name="proteusCASTAÑEDA">
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