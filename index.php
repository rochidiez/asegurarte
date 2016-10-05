<?php
include_once 'srv/dataVisitaIns.php';
$menuActivo='home';
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
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/20140415/jquery.cycle2.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src='jquery/jquery.placeholder.js' type='text/javascript'></script>
<script src="js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
<script src="js/ie10-viewport-bug-workaround.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- Google Code para etiquetas de remarketing -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 955532598;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/955532598/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php include('includes/analytics.php'); ?>

</head>

<body>

	<?php include('includes/header.php'); ?>

	<div class="grey-back">
		<div class="container">

			<!-- Cycle -->
			<div class="jumbotron cycle-slideshow"
				data-cycle-pause-on-hover="true" data-cycle-speed="500"
				data-cycle-timeout="5000">
				<img src="img/cycle/01.jpg" alt="" txt="Desde hoy podés cotizar tu <strong> póliza online</strong>">
				<img src="img/cycle/02.jpg" alt="" txt="Completá el <strong> formulario</strong> y enviá tus datos">
				<img src="img/cycle/03.jpg" alt="" txt="Recibirás en tu email las <strong> propuestas</strong>">

				<article>
					<h1>
						Desde hoy podés cotizar tu <strong>póliza online</strong>
					</h1>
					<p>
						<span style="text-align: left;">Riesgos del Trabajo &nbsp;&nbsp;&nbsp;&nbsp;</span>
						<a class="btn btn-lg btn-primary" href="formLicitacion.php" role="button">
							<span class="glyphicon glyphicon-ok-sign"></span> Cotizar online</a>
					</p>
				</article>
			</div>


			<div id="columnas" class="row row2" style="display: none;">
				<div class="col-md-6">
					<h2>Accidentes Personales</h2>
					<div class="gre-box">
						<img src="img/accidentesPersonales.png" alt="">
						<center>
							<h3>Ahora también podés cotizar tu <strong>póliza online</strong></h3>
							<a class="btn btn-lg btn-primary" href="formAccPersonal.php" role="button">
							<span class="glyphicon glyphicon-ok-sign"></span> Cotizar online</a>
						</center>
					</div>
				</div>
				<div class="col-md-6">
					<h2>Consulta por otras coberturas</h2>
					<div class="gre-box">

						<!-- FORM -->
						<form id="homeform" action="" method="POST" role="form">
							<div class="alert alert-success fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">×</span><span class="sr-only">Close</span>
								</button>
								<span></span>
							</div>

							<div class="form-group inline">
								<!-- <label for="name">Nombre</label> -->
								<input type="text" class="form-control" id="nombre"
									placeholder="Nombre" required>
							</div>
							<div class="form-group inline" style="float: right;">
								<!-- <label for="mail">Email address</label> -->
								<input type="email" class="form-control" id="mail"
									placeholder="Email" required>
							</div>
							<div class="form-group">
								<!-- <label for="consult">Nombre</label> -->
								<input type="text" class="form-control" id="consulta"
									placeholder="Consulta" required>
							</div>

							<center>
								<button type="submit" class="btn btn-primary">Enviar</button>
							</center>
						</form>
						<!-- fin FORM -->

					</div>
				</div>
			</div>



		</div>
	</div>

	<?php include('includes/footer.php'); ?>


	<!-- MODAL -->
	<div class="modal fade" id="dialogoMensaje">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
					<h4 class="modal-title">Formulario Cotización A.P.</h4>
				</div>
				<div class="modal-body">
					<p>Formulario en construcción</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<!-- <button type="button" class="btn btn-primary">Guardar</button> -->
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->




	<script>
    	//Prevent default del FORM
		$('.myform').submit(function(e) {
	        e.preventDefault();
	        return false;
	    });

	    //Funcion de envio del form
	    function getAction() {
	        var n = $('input#nombre').val();
	        var e = $('input#mail').val();
	        var m = $('input#consulta').val();

	        $.ajax({
	            type: "POST",
	            url: "sendmail.php",
	            data: {n:n, e:e, m:m},
	            success: function(data) {
		            if(data == 'El mensaje fue enviado con éxito. ¡Muchas gracias!') {
	                    $('.alert').removeClass('alert-danger');
	                    $('.alert').addClass('alert-success');
	                    $('.alert > span').html('El mensaje fue enviado con éxito. ¡Muchas gracias!');
	                }
	                else {
	                    $('.alert').removeClass('alert-success');
	                	$('.alert').addClass('alert-danger');
	                	$('.alert > span').html('Ha habido un error. Por favor, inténtelo nuevamente.');
	                }

                  	$('.alert').fadeIn(300);
                  	// setTimeout(function () { $('.alert').alert('close'); }, 4000);

                  	//Clean fields
                  	$('input#nombre').val('');
                  	$('input#mail').val('');
                  	$('input#consulta').val('');
	            }
	        });
	    }



    	$(function(){
    		//Funcion que pasa el titulo de las slides
    		$('.cycle-slideshow').on( 'cycle-after', function( event, optionHash, outgoingSlideEl, incomingSlideEl ) {
			    var title = $(incomingSlideEl).attr('txt');
			    $('.jumbotron h1').html(title);
			});

			//Validacion del formulario
			$('#homeform').validate({
				submitHandler: function(form) {
	            	getAction();
	          	}
	        });
    	});

    </script>
</body>
</html>
