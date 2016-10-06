<?php
include_once('srv/dataServer.php');
session_start();

$cMensajeError='';
$regActual=array();

$regActual['acc_FFORMAPAGO']='1';
$regActual['acc_FPROVINCIA']='';
$regActual['acc_FPOSTAL']='';

if( isset( $_SESSION['acc_PACCPERSONAL'] ) ){
	// Lee datos desde la base usando la función paAccPersonal.operAccPersonal
	$params=array();
	$params['prm_dataSource']='cotizarte';
	$params['prm_funcion']='paAccPersonal.operAccPersonal';
	$params['prm_pAccPersonal']=$_SESSION['acc_PACCPERSONAL'];
	$data = json_decode(llamaServidorDatos( armaUrl($params) ),true);

	// error_log(print_r($data,true));
	
	// El registro se pasa a $regActual
	$rec = $data['records'][0];
	foreach ($rec as $llave => $valor)
		$regActual['acc_'.$llave] = $valor;
	
	// Borra dato la sesión
	unset($_SESSION['acc_PACCPERSONAL']);
	
} else if( isset( $_POST['acc_PACCPERSONAL'] ) ){
	$params=array();
	$params['prm_dataSource']='cotizarte';
	$params['prm_funcion']='paAccPersonal.operAccPersonalInsUpd';
	$params=copyArrayCambiaPrefijo($_POST, 'acc_', $params, 'prm_' );
	// TODO: Eliminar cuando se actualice a la nueva versión del Package AGV
	$params['prm_fEstado']=$_POST['acc_FESTADOWKF'];
	if( isset($_SESSION['PVISITA']))
		$params['prm_fVisita']=$_SESSION['PVISITA'];
	
	// error_log(print_r($_POST,true));
	
	try {
		$data = json_decode(llamaServidorDatos( armaUrl($params) ),true);
		$data = $data['records'][0];
		if( $data['NESTADO'] < 0 ) {
			$cMensajeError = $data['CMENSAJE'];
			// El _POST se pasa a $regActual
			$regActual=copyArrayCambiaPrefijo($_POST, 'acc_', $regActual, 'acc_' );
		} else {
			// Pasa la variable por sesión al siguiente paso
			$_SESSION['acc_PACCPERSONAL'] = $_POST['acc_PACCPERSONAL'];
			header("Location: formAccPersonalAsegurados.php");
		}
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
	<meta name="description" content="Formulario Accidentes Personales">
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
	<script src='js/bootstrap-datepicker.js' type='text/javascript'></script>
	<script src='js/jquery.validate.js' type='text/javascript'></script>
	<script src='jquery/jquery.placeholder.js' type='text/javascript'></script>
	<script src='jquery/jquery.blockUI.js' type='text/javascript'></script>
	
	<script src='js/facebookAccPersonal.js' type='text/javascript'></script>
	
	<script src="form/util.js" type='text/javascript'></script>
	<script src="form/accPersonal.js" type='text/javascript'></script>
	<script type="text/javascript">
	// Inicializa variables
	function inicializaVariables(){
		<?php
		foreach ($regActual as $prm => $valor){
			echo 'try {'."\n";
			echo '$("#'.$prm.'").val(decode2("'.$valor.'"));'."\n";
			echo '} catch(e) { console.log("'.$prm.'",e);}'."\n";
		}
	    if( $cMensajeError != '' && $cMensajeError != 'OK' ){
			// Si viene la variable $cMensajeError de PHP, se llama la función JS de mensajes
			echo "mensajeAlerta('$cMensajeError');";
		}
		?>
		// Inicializa checkbox de la Grilla
		if ($("#acc_CPRODUCTO").val() == 'A') {
			$('#tablaProducto').bootstrapTable('updateRow', {
				index : 0,
				row : {
					state : true
				}
			});
		} else if ($("#acc_CPRODUCTO").val() == 'B') {
			$('#tablaProducto').bootstrapTable('updateRow', {
				index : 1,
				row : {
					state : true
				}
			});
		}
		
		// Inicializa radio button Forma de Pago
		{
			var fFormaPago='<?php echo $regActual['acc_FFORMAPAGO'];?>';
			if( fFormaPago != '')
				$('#acc_FFORMAPAGO' + fFormaPago).prop("checked", true);
		}
		// Inicializa combos
		{
			var fProvincia='<?php echo $regActual['acc_FPROVINCIA'];?>';
			var fPostal='<?php echo $regActual['acc_FPOSTAL'];?>';
			operProvincia(function(cb){
				cb.val(fProvincia);
				if( fProvincia != '' ){
					operLocalidad(cb.val(),function(cbLoc){
						cbLoc.val(fPostal);
						fnFPostalChange();
					});
				}
			});
		}
	}
	</script>
</head>
<body>
	<div id="dialogoMensaje" title="¡ Atención !" align="center">
		<br />
		<p id="dialogoMensaje_text" style="font-size: 14px;">Mensaje</p>
		<br /> <input type="button" id="btDialogoAceptar" value="Aceptar"
			class="btn btn-gray col-lg-12 col-md-12 col-sm-12 col-xs-12" />
	</div>
	<?php 
	$menuActivo='accPersonal';
	include('includes/header.php');
	
	include('form/accPersonalCampos.php');
	
	include('includes/footer.php');
	?>

</body>
</html>
