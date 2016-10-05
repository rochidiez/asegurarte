<?php $menuActivo='ayuda'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link href="img/favicon.ico" rel="icon" type="image/x-icon" />

<title>asegurARTe</title>

<!-- STYLES -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="jquery/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/20140415/jquery.cycle2.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src='jquery/jquery-ui.min.js' type='text/javascript'></script>
<script src='jquery/jquery.placeholder.js' type='text/javascript'></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

<?php include('includes/analytics.php'); ?>
</head>

<body>

	<?php include('includes/header.php'); ?>

	<div class="grey-back">
	<div class="container">

		<h2>Cómo afiliarse</h2>

		<div class="row infograf">
			<div class="col-xs-12 default">
				<section>
					<h1>Recomendamos tener en cuenta los siguientes aspectos para elegir ART:</h1>

					<ul class="list-group">
					  	<li class="list-group-item">Asesoramiento en Prevención.</li>
					  	<li class="list-group-item">Programas de capacitación destinados a trabajadores.</li>
					  	<li class="list-group-item">Relevamiento de riesgos en todos los establecimientos.</li>
					  	<li class="list-group-item">La calidad de los prestadores médicos y de la atención médica, ya que disminuye el ausentismo laboral.</li>
					  	<li class="list-group-item">Canales de atención para consultas o reclamos.</li>
					  	<li class="list-group-item">Alicuotas que cobran.</li>
					</ul>

					<ul class="list-group red">
					  	<li class="list-group-item">NO elija su ART solo por las alicuotas</li>
					</ul>

					<span class="glyphicon glyphicon-arrow-down"></span>
				</section>
			</div>
		</div>

		<div class="row infograf">
			<div class="col-xs-12 primary">
				<section>
					<h1>ELIJA SU ART</h1>

					Complete la solicitud de afiliación.<br><br>
					<span class="glyphicon glyphicon glyphicon-file"></span><br><br>

					Presentación de la documentación.<br><br>
					<span class="glyphicon glyphicon-folder-open"></span><br><br>

					<ul class="list-group">
					  	<li class="list-group-item"><strong>Persona física:</strong> DNI original y copia.</li>
					  	<li class="list-group-item"><strong>Persona jurídica:</strong> constancia de la representación.</li>
					  	<li class="list-group-item"><strong>Apoderado:</strong> DNI y poder.</li>
					</ul>
					<br><br>

					<span class="glyphicon glyphicon-arrow-down"></span>

				</section>
			</div>
		</div>

		<div class="row infograf">
			<div class="col-xs-6 success">
				<section>
					<h1>ACEPTADA</h1>
					<strong>EMICIÓN DE CONTRATO</strong><br>

					Vigencia desde la fecha estipulada en la Solicitud de Ailiación con plazo de 1 año renovable automáticamente.<br><br>
					<span class="glyphicon glyphicon glyphicon-print"></span><br><br>

					La solicitud de afiliación y el contrato deben ser firmados por la ART y la parte empeladora.<br><br>
					<span class="glyphicon glyphicon glyphicon glyphicon-pencil"></span>

				</section>
			</div>
			<div class="col-xs-6 danger">
				<section>
					<h1>RECHAZADA</h1>

					La ART puede rechazar la afiliación porque el empleador posee un contrato extinguido por falta de pago.<br><br>
					<span class="glyphicon glyphicon glyphicon glyphicon-ban-circle"></span><br><br>

					La ART puede negarse a afiliarlo durante el término de 1 año a partir de la fecha de resición.<br><br>
					<span class="glyphicon glyphicon glyphicon-calendar"></span>
			</div>
		</div>

	</div>
	</div>

	<?php include('includes/footer.php'); ?>

	<script>
    	$(function(){

    	});

    </script>
</body>
</html>
