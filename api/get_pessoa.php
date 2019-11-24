<?php
include __DIR__.'/../control/PessoaControl.php';
$pessoaControl = new PessoaControl();

header('Content-type: application/json');

if ($pessoaControl->findAll()) {
	http_response_code(200);
	echo json_encode($pessoaControl->findAll());


}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não encontrado"));
}
?>