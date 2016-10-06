<?php
$obj=array();

$item = new STDClass();
$item->producto      = 'A';
$item->sumaMuerte    = '$ 500.000';
$item->sumaInvalidez = '$ 500.000';
$item->sumaReembolso = '$ 25.000';
array_push( $obj, $item );

$item = new STDClass();
$item->producto      = 'B';
$item->sumaMuerte    = '$ 350.000';
$item->sumaInvalidez = '$ 350.000';
$item->sumaReembolso = '$ 20.000';
array_push( $obj, $item );

// $item = new STDClass();
// $item->producto      = 'C';
// $item->sumaMuerte    = '$ 200.000';
// $item->sumaInvalidez = '$ 200.000';
// $item->sumaReembolso = '$ 15.000';
// array_push( $obj, $item );

echo json_encode($obj);
?>
