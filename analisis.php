<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title>Menú Análisis</title>
		<link rel="shortcut icon" href="img/icon.png"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component2.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">	
			<!-- Codrops top bar -->
			<div class="codrops-top clearfix">
				<span class="right">
					<a href="index.php" style="align:center;">
						<span>
							<img src="img/exit.png" width="20%" ><h5 style="margin-top: 1em;">Salir</h5>
						</span>
					</a>
				</span>
			</div>
			<header>
				<span><a href="menu.html"><img src="img/logo2.png" class="imag"></a></span>	
			</header>
			<div class="main clearfix">
				<nav id="menu" class="nav">					
					<ul>
						<li>
							<a href="examen_orina.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-orina"></i>
								</span>
								<span>Análisis Sanguíneos</span>
							</a>
						</li>
						<li>
							<a href="examen_heces.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-services"></i>
								</span>
								<span>Análisis de Heces</span>
							</a>
						</li>
						<li>
							<a href="examen_biometria.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-team"></i>
								</span>
								<span>Biometria Hematica</span>
							</a>
						</li>
						<li>
							<a href="examen_quimica_clinica.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-blog"></i>
								</span>
								<span>Quimica Clinica</span>
							</a>
						</li>
						<li>
							<a href="examen_coprologico.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-portfolio"></i>
								</span>
								<span>Exámen Coprologico</span>
							</a>
						</li>
						<li>
							<a href="examen_inmunologia.php">
								<span class="icon">
									<i aria-hidden="true" class="icon-contact"></i>
								</span>
								<span>Exámen Inmunologia</span>
							</a>
						</li>
						
					</ul>
				</nav>
			</div>
		</div><!-- /container -->
		<script>
			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};	

			//  Creating our button in JS for smaller screens
			var menuElements = document.getElementById('menu');
			menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

			//  Toggle the class on click to show / hide the menu
			document.getElementById('menutoggle').onclick = function() {
				changeClass(this, 'navtoogle active', 'navtoogle');
			}

			// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
			document.onclick = function(e) {
				var mobileButton = document.getElementById('menutoggle'),
					buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

				if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
					changeClass(mobileButton, 'navtoogle active', 'navtoogle');
				}
			}
		</script>
	</body>
</html>