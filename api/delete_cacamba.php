<?php
include __DIR__.'/../control/cacambaControl.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);
//echo $obj->titulo;

$id = $obj->id;

if(!empty($data)){	
 $cacambaControl = new cacambaControl();
 $cacambaControl->delete($obj,$id);
 header('Location:listar.php');
}



?>