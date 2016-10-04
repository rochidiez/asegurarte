<?php

if ( !empty($_POST['e']) ) {
	$email = $_POST['e'];
	$nombre = $_POST['n'];
	$mensaje = $_POST['m'];
	
	//Enviar email
	$destinatario = "info@asegurarte.com";
	$asunto = "asegurARTe - contacto web";
	$cuerpo = " 
	<html>
	<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<title></title>
	</head>
	
	<body>
	<table width='600' border='0' cellpadding='10' cellspacing='0'>
	  <tr>
		<td bgcolor='#FFFFFF' width='600' height='99'>
			<img src='http://www.asegurarte.com/img/mailheader.jpg' width='600' height='100' alt='' />
		</td>
	  </tr>
	  <tr>
		<td bgcolor='#FFFFFF'></td>
	  </tr>
	  <tr>
		<td>
			<font color='#000' face='Tahoma, Geneva, sans-serif;'>
				<b>Nombre:</b> ".$nombre."<br><br>
				<b>E-mail:</b> ".$email."<br><br>
				<b>Consulta:</b><br> ".$mensaje."
			</font>
		</td>
	  </tr>
	  <tr>
		<td bgcolor='#FFFFFF'></td>
	  </tr>
	</table>
	</body>
	</html>"; 
	
	//para el envio en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
	
	//direccion del remitente 
	$headers .= "From: info@asegurarte.com\r\n"; 
	
	
	if(mail($destinatario,$asunto,$cuerpo,$headers)) {
		echo "El mensaje fue enviado con éxito. ¡Muchas gracias!";
	}
	else {
		echo "Ha habido un error. Por favor, inténtelo nuavmente.";
	}

}
else {
	echo "Ha habido un error. Por favor, inténtelo nuavmente.";
}
?>