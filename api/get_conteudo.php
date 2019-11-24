<?php
include __DIR__.'/../control/ConteudoControl.php';
$conteudoControl = new ConteudoControl();

header('Content-Type: application/json');

echo json_encode($conteudoControl->findAll());

// foreach($conteudoControl->findAll() as $valor){
// 	echo json_encode($valor);
// }


?>