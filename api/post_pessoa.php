<?php
include __DIR__.'/../control/PessoaControl.php';
 

header('Content-type: application/json');

$data = file_get_contents('php://input');
$obj =  json_decode($data);

if(!empty($data)){	
	try {
 		$pessoaControl = new PessoaControl();
 		$pessoaControl->insert($obj);
 		http_response_code(200);
 		echo json_encode($obj);
 	}
 	catch (PDOException $e) {
 		http_response_code(400);
		echo json_encode(array("mensagem" => "Parâmetros Inválidos"));
	}
}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
}


?>