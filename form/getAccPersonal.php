<?php
include_once('../srv/dataServer.php');

$params=array();
$params['prm_dataSource']='cotizarte';
$params['prm_funcion']='paAccPersonal.operAccPersonal';
$params=copyArrayCambiaPrefijo($_POST, 'prm_', $params, 'prm_' );
echo llamaServidorDatos( armaUrl($params) );
?>
