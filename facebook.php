<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="img/favicon.ico" rel="icon" type="image/x-icon" />

<title>asegurARTe</title>

<!-- STYLES -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet">
<style>
.mainh1 {
	font-size: 44px;margin:0;
}
@media all and (min-width: 500px) {
	.mainh1 {
		font-size: 37px;
	}
}
</style>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/20140415/jquery.cycle2.min.js"></script> -->
<script src="js/jquery.validate.js"></script>
<script src='jquery/jquery.placeholder.js' type='text/javascript'></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
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
					<h1 class="mainh1">
						Dejanos tus datos y nos comunicaremos para <strong>cotizar tu póliza</strong>
					</h1>
				</article>
			</div>

			<div class="row">
				<div class="col-md-4">

					<form class="form" style="margin-top: 20px;">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">CUIT</div>
								<input type="text" class="form-control" id="cuit">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Teléfono</div>
								<input type="text" class="form-control" id="telefono">
							</div>
						</div>
					</form>

					<a id="fblogin" class="btn btn-lg btn-primary" href="#" role="button" style="margin: 20px auto; font-size: 30px; display: block;"><span class="fa fa-facebook-square"></span> Dejar mis datos</a>
					<p style="font-size:11px;">Los campos CUIT y Teléfono no son obligatorios. <strong>asegurARTe</strong> garatiza la absoluta confidencialidad de los datos perosnales recavados.</p>
				</div>
				<div class="col-md-8">
					<div class="jumbotron" style="margin: 20px 0 10px 0;height: auto;">
						<div style="padding: 20px;">
							<p>Asegurarte es la empresa líder de comercialización de <strong>Seguros de ART</strong> por Internet. Ofrecemos cotización inmediata de más de 6 aseguradoras para el segmento de accidentes de riesgos de trabajo.</p>
							<p style="font-size: 14px;">Nuestro staff profesional tiene más de 20 años de experiencia en el mercado de seguros. Estamos abocados integramente a permitirle a nuestros clientes obtener de la forma más simple las mejores coberturas líderes del mercado al mejor precio.</p>
							<p style="font-size: 14px;">Todas nuestras operaciones estan certificadas y nuestro partner emisor, NetBroker, se encuentra debidamente autorizado por la Superintendencia de Seguros de la Nación como Broker de seguros.</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<?php include('includes/footer.php'); ?>

	<script>

    	$(function(){
    		//Funcion que pasa el titulo de las slides
   //  		$('.cycle-slideshow').on( 'cycle-after', function( event, optionHash, outgoingSlideEl, incomingSlideEl ) {
			//     var title = $(incomingSlideEl).attr('txt');
			//     $('.jumbotron h1').html(title);
			// });
    	});

    </script>
</body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      // appId      : '274208542608943',
      appId      : '1609525545933640',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  $('#fblogin').click(function(event) {
  	t = $(this);
  	t.button('loading');
	/* Act on the event */
	FB.login(function(response) {
   // handle the response
   if (response.status === 'connected') {
    // Logged into your app and Facebook.
    FB.api('/me', function(response) {
	    console.log(JSON.stringify(response));

	    jQuery.ajax({
	      url: 'savefb.php',
	      type: 'GET',
	      dataType: 'json',
	      data: {data: response, cuit: $('#cuit').val(), tel: $('#telefono').val() },
	      complete: function(xhr, textStatus) {
	        //called when complete
	      },
	      success: function(data, textStatus, xhr) {
	        //called when successful
	    	// console.log(data);
			location.replace('fbthanks.php');
	      },
	      error: function(xhr, textStatus, errorThrown) {
	        //called when there is an error
	        console.log(textStatus);
	      }
	    });

	});
  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not. ,user_birthday,user_hometown,user_website
  }
 }, {scope: 'public_profile,email'});
});

</script>
</html>
