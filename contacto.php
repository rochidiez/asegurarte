<?php $menuActivo='contacto'; ?>
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
	<?php include('includes/analytics.php'); ?>
  </head>

  <body>

  	<?php include('includes/header.php'); ?>

	<div class="grey-back">
		<div class="container" style="max-width: 600px;">
	  		
	  		<h2>Contacto</h2>
			<hr>

	  		<!-- FORM -->
			<form id="contacto" action="" method="POST" role="form">
				<div class="alert alert-success fade in" role="alert">
		        	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		        	<span></span>
	        	</div>

				<div class="form-group">
					<!-- <label for="name">Nombre</label> -->
					<input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
				</div>
				<div class="form-group">
					<!-- <label for="mail">Email address</label> -->
					<input type="email" class="form-control" id="mail" placeholder="Email" required>
				</div>
				<div class="form-group">
					<!-- <label for="consult">Nombre</label> -->
					<textarea class="form-control" id="consulta" placeholder="Consulta" rows="5" required></textarea>
				</div>
				
				<center><button type="submit" class="btn btn-m btn-primary">Enviar</button></center>
			</form>
			<!-- fin FORM -->


		</div>
  	</div>

  	<?php include('includes/footer.php'); ?>

	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/20140415/jquery.cycle2.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
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
	        var m = $('textarea#consulta').val();

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
                  	$('textarea#consulta').val('');
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
			$('#contacto').validate({
				submitHandler: function(form) {
	            	getAction();
	          	}
	        });
    	});
    	
    </script>
  </body>
</html>
