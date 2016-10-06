<?php
include_once('srv/dataServer.php');
session_start();

if( isset($_SESSION['PVISITA']))
	$pVisita=$_SESSION['PVISITA'];
if( isset($_SESSION['acc_PACCPERSONAL'])){
	$params=array();
	$params['prm_dataSource']='cotizarte';
	$params['prm_funcion']='paAccPersonal.operAccPersonalFinal';
	$params['prm_pAccPersonal']=$_SESSION['acc_PACCPERSONAL'];
	try {
		llamaServidorDatos( armaUrl($params) );
	} catch (Exception $e) {
		error_log('Al finalizar solicitud AP:'.$e);
	}
}
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
	<meta name="description" content="Formulario Accidentes Personales">
	<meta name="author" content="Andres Galaz">
	<link href="img/favicon.ico" rel="icon" type="image/x-icon" />

	<title>asegurARTe</title>

	<!-- STYLES -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/custom.css" rel="stylesheet" type="text/css">
	<link href="jquery/ap/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	
	<!-- SCRIPTS -->
	<?php include('includes/analytics.php'); ?>
	<script src='jquery/jquery.js' type='text/javascript'></script>
	<script src='jquery/jquery-ui.js' type='text/javascript'></script>
	<script src='js/bootstrap.min.js' type='text/javascript'></script>
	<script src='js/jquery.validate.js' type='text/javascript'></script>
	<script src='jquery/jquery.placeholder.js' type='text/javascript'></script>
	<script src='jquery/jquery.blockUI.js' type='text/javascript'></script>
	
</head>
<body>
	<div id="dialogoMensaje" title="Solicitud Ingresada" align="center">
		<br />
		<p id="dialogoMensaje_text" style="font-size: 14px;">
			Muchas Gracias.<br> 
			Nos comunicaremos con Ud. a la brevedad.		
		</p>
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
			show : 'slide',
			autoOpen: true,
			modal: true,
			dialogClass: "dlg-no-close",
			close : function(event, ui) {
				document.location.href ='index.php';
			}
		});
 		$("#btDialogoAceptar").on("click", function() {
 			$("#dialogoMensaje").dialog("close");
 		});
	});
	</script>
	<?php 
	$menuActivo='accPersonal';
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
