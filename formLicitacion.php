<?php
session_start();
$bRefresco = false;
if($_SESSION['hasbeenhere'] == 1) {
	$bRefresco = true;
} else {
	$_SESSION['hasbeenhere'] = 1;
	$bRefresco = false;
}

/*
 * No se actualiza si es refresco, a menos que tenga la PK definida,
 * en este último caso se actualiza sin riesgo, de otra manera se
 * duplican los registros
 */
if( ! $bRefresco || $_POST['lic_PLICITACION'] != '' ){
	$cMensajeError='';
	
	// error_log(print_r($_POST, true));
	if( isset($_POST["lic_BMAIL"])){
		include_once 'srv/dataLicitacionUpd.php';
	}
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

<script src="form/licitacion.js" type='text/javascript'></script>
<style>
.ui-autocomplete-loading {
	background: white url("img/busy.gif") right center no-repeat;
}

.ui-widget {
	font-family: Verdana, Arial, sans-serif;
	font-size: 12px;
}

.ui-autocomplete.ui-widget {
	font-family: Verdana, Arial, sans-serif;
	font-size: 10px;
}
</style>

<script type="text/javascript">
// Chat online
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var refferer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//54.68.195.226/lhc_web/index.php/esp/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(check_operator_messages)/true/(top)/350/(units)/pixels/(leaveamessage)/true?r='+refferer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>

<?php include('includes/analytics.php'); ?>

<?php if( $cMensajeError=='OK'){?>
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
<?php }?>

</head>

</head>
<body>
	<div id="dialogoMensaje" title="¡ Atención !" align="center">
		<br />
		<p id="dialogoMensaje_text" style="font-size: 14px;">Mensaje</p>
		<br /> <input type="button" id="btDialogoAceptar" value="Aceptar"
			class="btn btn-gray col-lg-12 col-md-12 col-sm-12 col-xs-12" />
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

		$("#lic_CCIIUPRINCIPAL").autocomplete({
			source : "srv/dataSearchCiuu.php",
			minLength : 2,
			select : function(event, ui) {
			 	// Prevent the value from being inserted.
				event.preventDefault();
				$(this).val(ui.item.label);
			}
		});
		
		$("#lic_CCIIUSECUNDARIO").autocomplete({
			source : "srv/dataSearchCiuu.php",
			minLength : 2,
			select : function(event, ui) {
			 	// Prevent the value from being inserted.
				event.preventDefault();
				$(this).val(ui.item.label);
			}
		});

		$('#lic_CODVERIFICA').realperson({
			length: 5,
			regenerate : 'Refrescar'
		});

		function inicioVariables(){
			// Si hay valores $_POST se incializa
			<?php 	
			foreach ($_POST as $prm => $valor){
				$pos = strpos ( $prm, 'lic_' );
				// Solo pasa los parámetros que comienzan con lic_
				if( $pos !== false && $pos == 0 ){
					echo 'try {'."\n";
					echo '$("#'.$prm.'").val("'.$valor.'");'."\n";
					echo '} catch(e) {}'."\n";
				}
			}
			?>
			// Inicializa combos
			{
				var fProvincia='<?php echo $_POST['lic_FPROVINCIA'];?>';
				var fPostal='<?php echo $_POST['lic_FPOSTAL'];?>';
				operProvincia(function(cb){
					cb.val(fProvincia);
					if( fProvincia != '' ){
						operLocalidad(cb.val(),function(cbLoc){
							cbLoc.val(fPostal);
						});
					}
				});
				var fArtActual='<?php echo $_POST['lic_FARTACTUAL'];?>';
				operArt(function(cb){
					cb.val(fArtActual);
				});
			}
		}
		// Si viene algún mensaje de error, se muestra
		var cMensaje='<?php echo $cMensajeError; ?>';
		if( cMensaje=='OK'){
			mensajeAlerta('Su transacción ha sido cargada exitosamente.<br>' // 
					+ 'Recibirá las cotizaciones por mail dentro de los próximos 5 días.'
					, function() { document.location.href ='index.php'; }); 
		
		} else if( cMensaje!=''){
			mensajeAlerta(cMensaje, inicioVariables);
		} else {
			inicioVariables();
			// Si no hay mensajes se verifican los datos
			// Si ya está cargado el Email se lee en formulario en dorma automática
			if(validaEmail($("#lic_CEMAIL").val())){
				fnLeerFormByEmail();
			}
		}
	});
	</script>

	<?php 
	$menuActivo='licitacion';
	include('includes/header.php');

	include('form/licitacionCampos.php');

	include('includes/footer.php');
	?>

</body>
</html>
