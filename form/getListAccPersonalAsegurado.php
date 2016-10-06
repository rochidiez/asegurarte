<?php
include_once '../srv/dataServer.php';
session_start();

// Si no está definida la variable de sesión, se devuelve un arreglo vacío
if( ! isset( $_SESSION['acc_PACCPERSONAL'])){
	echo json_encode(array());
	exit;
}

$params=array();
$params['prm_dataSource']='cotizarte';
$params['prm_funcion']='paAccPersonal.operAccPersonalAsegurado';
$params['prm_pAccPersonal']=$_SESSION['acc_PACCPERSONAL'];
$data = json_decode(llamaServidorDatos( armaUrl($params) ),true);
echo json_encode($data['records']);
?>
