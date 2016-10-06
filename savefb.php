<?
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {

$url = "https://docs.google.com/a/bullpix.com/forms/d/1me6Awmhvk7rsWdrhCw5G89kvUhqFIl9cSud_Jo7tj-Q/formResponse";
extract($_GET);

$array = array(
	'entry_334939863'=>$first_name, //Nombre
	'entry_1166568197'=>$last_name,//Apellido
	'entry_2029033843'=>$email,//email
	'entry_415299674'=>$gender,//gender
	// 'entry_1754515759'=>$birthday,//gender
	// 'entry_362600947'=>$hometown['name'],//hometown
	// 'entry_936107774'=>$website,//website
	'entry_343232043'=>$verified,//verified
	'entry_975656498'=>$link //link
	);

$post_data = http_build_query($array, '', '&');
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_USERAGENT,
// 	'Mozilla/4.0 (compatible; ST PHP Client; ' . php_uname('s') . '; PHP/' .
// 	phpversion() . ')');
curl_setopt($ch, CURLOPT_URL, $url );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$headers = array();
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$res = curl_exec($ch);
curl_close($ch);

echo json_encode(array('msg'=>'Muchas Gracias'));
} catch (Exception $e) {
echo json_encode(array('msg'=>$res));
}

?>