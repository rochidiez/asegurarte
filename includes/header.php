
<div class="container hideonmob">
		<!-- Header -->
		<div class="header">
			<h4 align="right" style="color: #1688c9;">Línea de contacto &nbsp;&nbsp;<b> 0810 999 0913</b></h4>
			<div class="arts pull-right">
				<!--
				<p><a href="https://www.galenoart.com.ar/" target="_blank"><img src="img/arts/galeno.png" alt=""></a></p>
				<p><a href="http://www.lacaja.com.ar/art" target="_blank"><img src="img/arts/lacaja.png" alt=""></a></p>
				<p><a href="https://www.gruposancorseguros.com/ar/es/home-art" target="_blank"><img src="img/arts/omintART.png" alt=""></a></p>
				<p><a href="http://www.smgart.com.ar/index.asp" target="_blank"><img src="img/arts/smg.png" alt=""></a></p>
				<p><a href="http://www.qbe.com.ar/ar/home.asp" target="_blank"><img src="img/arts/qbe.png" alt=""></a></p>
				-->

				<p><a href="formLicitacion.php" target="_blank"><img src="img/arts/berkley.png" alt=""></a></p>
				<p><a href="formLicitacion.php" target="_blank"><img src="img/arts/experta.png" alt=""></a></p>
				<!-- <p><a href="formLicitacion.php" target="_blank"><img src="img/arts/lacaja.png" alt=""></a></p> -->
				<p><a href="formLicitacion.php" target="_blank"><img src="img/arts/omintART.png" alt=""></a></p>
				<p><a href="formLicitacion.php" target="_blank"><img src="img/arts/smg.png" alt=""></a></p>
				<p><a href="formLicitacion.php" target="_blank"><img src="img/arts/provinciaArt.png" alt=""></a></p>
				<!-- <p><a href="formLicitacion.php" target="_blank"><img src="img/arts/qbe.png" alt=""></a></p> -->

			</div>

			<h3><img src="img/logo.png" alt="asegurARTe"></h3>
		</div>

		<!-- Static navbar -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">

						<li <?php echo $menuActivo == 'home'       ? 'class="active"' :''?>><a href="index.php">Home</a></li>
						<li <?php echo $menuActivo == 'nosotros'   ? 'class="active"' :''?>><a href="sobre-nosotros.php">Nosotros</a></li>
						<!-- <li <?php //echo $menuActivo == 'afiliarse'   ? 'class="active"' :''?>><a href="como-afiliarse.php">Cómo afiliarse</a></li> -->
						<li <?php echo $menuActivo == 'licitacion' ? 'class="active"' :''?>><a href="formLicitacion.php">Licitá tu póliza</a></li>
						<!-- li><a href="#">Ingreso Contador</a></li -->
						<!-- li><a href="#">Ingreso Productor</a></li -->
						<li><a href="http://54.68.195.226:8080/webDesap/do/app?pRecurso=72&nombreForm=TOP&tema=neptune">Exclusivo ART</a></li>
						<li <?php echo $menuActivo == 'faq'   ? 'class="active"' :''?>><a href="preguntas-frecuentes.php">Preguntas Frecuentes</a></li>
						<li class="dropdown <?php echo $menuActivo == 'ayuda'   ? 'active' :''?>">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ayuda <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="como-afiliarse.php">Cómo afiliarse</a></li>
				            <li><a href="como-cambiar-art.php">Cómo cambiar de ART</a></li>
				            <li><a href="http://www.srt.gob.ar/index.php/trabajador/cual-es-mi-art">Cual es mi ART?</a></li>
				            </ul>
				        </li>
						<li <?php echo $menuActivo == 'contacto'   ? 'class="active"' :''?>><a href="contacto.php">Contacto</a></li>

					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><img src="img/face.png" alt=""></a></li>
						<!-- li><a href="#"><img src="img/in.png" alt=""></a></li -->
						<!-- li><a href="#"><img src="img/rss.png" alt=""></a></li -->
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>


	</div> <!-- /container -->

			<div class="navbar-mobile">
				<div class="navbar__header">
					<img src="img/menu.svg" />
					<h1 class="logo-min"><img src="img/logo.png" alt="asegurARTe"></h1>
				</div>
				<div class="navbar__phone">
					<p>
						Llamanos   0810 999 0913
					</p>
				</div>
			</div>
