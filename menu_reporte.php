
 <!DOCTYPE html>
<html lang="es" class="no-js">
<head>
		<meta charset="UTF-8" />
		<title>Menú Reporte</title>
		<link rel="shortcut icon" href="img/icon.png">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
  <body>
    <div class="container">
        <header>
				  <span><a href="menu.php"><img src="img/logo2.png" class="imag"></a></span>
			  </header>
      <div class="main clearfix">
          <nav id="menu" class="nav" style="">
              <ul>
                  <li style="visibility:hidden;">
                    <a href="">
								    <span class="icon">
									    <i aria-hidden="true" class="icon-services"></i>
								    </span>
								    <span>Correo electr&oacutenico</span>
							      </a>
                  </li>



<!--*****************************************************************************************-->
                  <li>
                    <a target="_blank" href="reporte_prod_fin.php">
						<span class="icon">
					        <i aria-hidden="true" class="icon-prodterm"></i>
					   </span>
					   <span style="font-size: 17px">Productos finalizados</span>
					</a>
                  </li>

                   <li>
                    <a target="_blank" href="reporte_prod_no_fin.php">
					    <span class="icon">
						    <i aria-hidden="true" class="icon-prodexis"></i>
					    </span>
						<span style="font-size: 16.4px">Productos no finalizados</span>
					</a>
                  </li>

                  <li>
                    <a target="_blank" href="reporte_gral_analisis.php">
						<span class="icon">
						    <i aria-hidden="true" class="icon-veranalis"></i>
						</span>
				        <span>Mostrar análisis</span>
				    </a>
                  </li>
<!--*****************************************************************************************-->
                   <li style="visibility:hidden;">
                    <a href="">
								    <span class="icon">
									    <i aria-hidden="true" class="icon-services"></i>
								    </span>
								    <span>Correo electr&oacutenico</span>
							      </a>
                  </li>
                  <li style="visibility:hidden;">
                    <a href="">
								    <span class="icon">
									    <i aria-hidden="true" class="icon-services"></i>
								    </span>
								    <span>Visualizar PDF</span>
							      </a>
                  </li>
              </ul>
          </nav><!--NAV-->
      </div> <!--class = "main clearfix"-->
    </div> <!--Cointainer-->
  </body>

</html>


 <script type="text/javascript">
     // var prop  = <?php echo $idpropio; ?>;
     // var pac   = <?php echo $idpaciente; ?>;
     // var med   = <?php echo $medicos_idmedicos; ?>;
     // alert(prop+" "+pac+" "+med);
     // window.open("reporte.php?idpr=" + prop + "&idpac=" + pac + "&idm=" + med, "_blank");
 </script>
