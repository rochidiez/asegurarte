<?php
session_start();
if( isset($_SESSION['PVISITA']))
	$pVisita=$_SESSION['PVISITA'];
session_unset();
session_destroy();

if( isset($pVisita)){
	// Repone la PK que identifica la visita
	session_start();
	$pVisita=$_SESSION['PVISITA'];
}
?>
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
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="jquery/ap/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<!-- CAPTCHA -->
<link href="css/jquery.realperson.css" rel="stylesheet" type="text/css">

<!-- SCRIPTS -->
<script src='jquery/jquery.js' type='text/javascript'></script>
<script src='jquery/jquery-ui.js' type='text/javascript'></script>
<script src='js/bootstrap.min.js' type='text/javascript'></script>
<script src='js/jquery.validate.js' type='text/javascript'></script>
<script src='jquery/jquery.placeholder.js' type='text/javascript'></script>
<script src='jquery/jquery.blockUI.js' type='text/javascript'></script>

<!-- CAPTCHA -->
<script src='js/jquery.plugin.js' type='text/javascript'></script>
<script src='js/jquery.realperson.js' type='text/javascript'></script>

<!-- SOCIAL -->
<script src='js/facebook.js' type='text/javascript'></script>
<script src='js/google.js' type='text/javascript'></script>

<?php include('includes/analytics.php'); ?>

<script src="form/util.js" type='text/javascript'></script>

<!-- Google Code for Cotizaciones Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 955532598;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "g7PnCMzhz1cQtorRxwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/955532598/?label=g7PnCMzhz1cQtorRxwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</head>

</head>
<body>
	<div id="dialogoMensaje" title="¡ Atención !" align="center">
		<br />
		<p id="dialogoMensaje_text" style="font-size: 14px;">Mensaje</p>
		<br />
		<input type="button" id="btDialogoAceptar" value="Aceptar" class="btn btn-gray col-lg-12 col-md-12 col-sm-12 col-xs-12" />
	</div>
	<script>
	/*
	 * jQuery UI Dialog: Hide the Close Button/Title Bar
	 * http://salman-w.blogspot.com/2013/05/jquery-ui-dialog-examples.html
	 */
	$().ready(function(){
		$("#dialogoMensaje").dialog({
			autoOpen: false,
			modal: true,
			dialogClass: "dlg-no-close"
		});
		$("#btDialogoAceptar").on("click", function() {
			$("#dialogoMensaje").dialog("close");
		});

		mensajeAlerta('Muchas Gracias.<br>' // 
					+ 'Nos comunicaremos con Ud. a la brevedad.'
					, function() { document.location.href ='index.php'; }); 
	});
	</script>

	<?php 
	$menuActivo='licitacion';
	include('includes/header.php');
	?>
	<div class="js" style="height: 320px;">
		<div class="container relative clearfix cb">
			<div class="form-group">
				<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative pL0">
					<br>
					<br>
					<br>
					<br>
					<br>
					<center>	
						<strong>Muchas Gracias</strong>.<br>
						Nos comunicaremos con Ud a la brevedad.
					</center>
				</span>
			</div>
		</div>
	</div>	
	<?php 
	include('includes/footer.php');
	?>

</body>
</html>
