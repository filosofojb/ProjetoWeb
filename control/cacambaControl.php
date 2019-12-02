<?php
include __DIR__.'/../model/cacamba.php';

class CacambaControl{

	function insert($obj){
		$cacamba = new cacamba();
		//echo $obj->titulo;
		return $cacamba->insert($obj);
	}

	function update($obj,$id){
		$cacamba = new cacamba();
		return $cacamba->update($obj,$id);
	}

	function delete($obj,$id){
		$cacamba = new cacamba();
		return $cacamba->delete($obj,$id);
	}

	function find($id = null){
		$cacamba = new cacamba();
		return $cacamba->find($id);
	}

	function findAll(){
		$cacamba = new cacamba();
		return $cacamba->findAll();
	}
}

?>