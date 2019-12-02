<?php
include __DIR__.'/../control/cacambaControl.php';
$cacambaControl = new cacambaControl();

header('Content-Type: application/json');

echo json_encode($cacambaControl->findAll());

// foreach($cacambaControl->findAll() as $valor){
// 	echo json_encode($valor);
// }


?>