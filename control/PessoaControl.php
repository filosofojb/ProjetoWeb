<?php
include __DIR__.'/../model/pessoa.php'

class PessoaControl{

    function insert($obj){
	 $pessoa=new pessoa();
	 return $pessoa->insert($obj);
    }
    function update($obj,$id){
	 $pessoa=new pessoa();
	 return $pessoa->update($obj,$id);
    }
    function delete($obj,$id){
    	$pessoa = new pessoa();
    	return $pessoa ->delete($obj,$id);
    }
    function find($id = null){
    	$pessoa =new pessoa();
    	return $pessoa->find($id);
    }
    function findAll(){
    	$pessoa=new pessoa();
    	return $pessoa->findAll();
    }

}




?>