<?php
// error_reporting(0);

$from = 'noreply@asegurarte.com';
$to = 'info@asegurarte.com';
// $to = 'andres.galaz@gmail.com';
$subject= 'Consulta web';
$body = "<html> <head> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> <title></title> </head> <body> <table width='600' border='0' cellpadding='10' cellspacing='0'> <tr> <td bgcolor='#FFFFFF' width='600' height='99'> <img src='http://www.asegurarte.com/newsite/img/mailheader.jpg' width='600' height='100' alt='' /> </td> </tr> <tr> <td bgcolor='#FFFFFF'></td> </tr> <tr> <td> <font color='#000' face='Tahoma, Geneva, sans-serif;'> <b>Nombre:</b> ".$_POST['n']."<br><br> <b>E-mail:</b> <a href='mailto:".$_POST['e']."'>".$_POST['e']."</a><br><br> <b>Consulta:</b><br> ".$_POST['m']."</font> </td> </tr> <tr> <td bgcolor='#FFFFFF'></td> </tr> </table> </body> </html>";
$url = "http://54.68.195.226:8080/webDesap/do/storeLeerNoLogged?prm_dataSource=cotizarte&prm_funcion=paCotizarte.operSendMail&prm_to=$to&prm_from=$from&prm_subject=".urlencode($subject)."&prm_body=".urlencode($body);

$response = file_get_contents($url);
$responsearray = json_decode($response);
$responsearray = $responsearray;

// echo '<pre>';
// print_r($responsearray);
// echo '</pre>';

if ($responsearray->success) {
	echo "El mensaje fue enviado con éxito. ¡Muchas gracias!";
}
else {
	echo "Ha habido un error. Por favor, inténtelo nuavmente.";
}
?>
