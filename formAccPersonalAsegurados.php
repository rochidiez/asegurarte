<?php
include_once 'srv/dataServer.php';
session_start();
/*
 * Debe tener la FK, porque debe venir de la página anterior
 */
if( $_SESSION['acc_PACCPERSONAL'] == '' ){
	header("Location: formAccPersonal.php");
}

// Grabar un asegurado
$params=null;
if( isset($_POST['ase_ACCION']) && $_POST['ase_ACCION'] == 'Actualizar'){
	$params=array();
	$params['prm_dataSource']='cotizarte';
	$params['prm_funcion']='paAccPersonal.operAccPersonalAseguradoInsUpd';
	$params['prm_fAccPersonal']=$_SESSION['acc_PACCPERSONAL'];
	$params=copyArrayCambiaPrefijo($_POST, 'ase_', $params, 'prm_' );
	
} else if( isset($_POST['ase_PASEGURADO']) && $_POST['ase_PASEGURADO'] !='' ){
	$params=array();
	$params['prm_dataSource']='cotizarte';
	$params['prm_funcion']='paAccPersonal.operAccPersonalAseguradoDel';
	$params['prm_pAsegurado']=$_POST['ase_PASEGURADO'];
}
if( $params != null ){
	try {
		$data = json_decode(llamaServidorDatos( armaUrl($params) ),true);
		$data = $data['records'][0];
		if( $data['NESTADO'] < 0 )
			$cMensajeError = $data['CMENSAJE'];
	} catch (Exception $e) {
		$cMensajeError = 'Error desconocido';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fomrulario Asegurados para Accidentes Personales">
	<meta name="author" content="Andres Galaz">
	<link href="img/favicon.ico" rel="icon" type="image/x-icon" />

	<title>asegurARTe</title>

	<!-- STYLES -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.datepicker.css" rel="stylesheet" type="text/css">
	<link href="css/custom.css" rel="stylesheet" type="text/css">
	<link href="jquery/ap/jquery-ui.min.css" rel="stylesheet" type="text/css" />

	<!-- SCRIPTS -->
	<?php include('includes/analytics.php'); ?>
	<script src='jquery/jquery.js' type='text/javascript'></script>
	<script src='jquery/jquery-ui.js' type='text/javascript'></script>
	<script src='js/bootstrap.min.js' type='text/javascript'></script>
	<script src='js/bootstrap-table.min.js' type='text/javascript'></script>
	<script src='js/bootstrap-table-es-AR.min.js' type='text/javascript'></script>
	<script src='js/bootstrap-datepicker.js' type='text/javascript'></script>
	<script src='js/jquery.validate.js' type='text/javascript'></script>
	<script src='jquery/jquery.placeholder.js' type='text/javascript'></script>
	<script src='jquery/jquery.blockUI.js' type='text/javascript'></script>

	<script src="form/util.js" type='text/javascript'></script>
	<script src="form/accPersonalAsegurados.js" type='text/javascript'></script>
	<script type="text/javascript">
	// Inicializa variables
	function inicializaVariables(){
		<?php
		foreach ($_SESSION as $prm => $valor){
			$pos = strpos ( $prm, 'acc_' );
			// Solo pasa los parámetros que comienzan con lic_
			if( $pos !== false && $pos == 0 ){
				echo 'try {'."\n";
				echo '$("#'.$prm.'").val("'.$valor.'");'."\n";
				echo '} catch(e) {}'."\n";
			}
		}
		if( isset($cMensajeError) && $cMensajeError != 'OK' ){
			echo "mensajeAlerta('$cMensajeError');";
		}
		?>
	}
	</script>
</head>
<body>
	<div id="dialogoMensaje" title="¡ Atención !" align="center">
		<br />
		<p id="dialogoMensaje_text" style="font-size: 14px;">Mensaje</p>
		<br />
		<input type="button" id="btDialogoAceptar" value="Aceptar" class="btn btn-gray col-lg-12 col-md-12 col-sm-12 col-xs-12" />
	</div>
	<?php 
	$menuActivo='accPersonal';
	include('includes/header.php');
	include('form/accPersonalAseguradoCampos.php');
	include('form/accPersonalAseguradosTabla.php');
	include('includes/footer.php');
	?>
</body>
</html>
