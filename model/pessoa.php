<?php 
include __dir__.'Conexao.php';
public class Pessoa extends Conexao{
}
private $id;
private $nome;
private $email;
private $celular;

public __construct($id,$nome,$email,$celular)
{
	this->id=$id;
	this->nome=$nome;
	this->email=$email;
	this->celular=$celular;                                                                                          
}
public function getID(){
	return this->id;
}
public function getNome(){
	return this->nome;
}
public function getEmail(){
	return this->email;
}
public function getCelular(){
	return this->celular;
}
public function setID($id){
	this->id=$id;
}

public function setNome($nome){
this->nome=$nome
}

public function setEmail($email){
	this->email=$email;
}

public function setCelular($celular){
	this->celular=$celular;
}
public function insert($obj){
	$sql=
	"INSERT INTO `pessoa` (idPessoa,Nome,Email,Celular,senha) VALUES (:idPessoa,:nome,:email,:celular,:senha);";
	$consulta = Conexao::prepare($sql);
	$consulta->bindvalue('idPessoa',$obj->idPessoa);
	$consulta->bindvalue('nome',$obj->nome);
	$consulta->bindvalue('email',$obj->email);
	$consulta->bindvalue('celular',$obj->celular);
	$consulta->bindvalue('senha',$obj->senha);
	$consulta->execute();
	return Conexao::lastId();
}
public function ($obj,$id=null){
	$sql=
"UPDATE 
   Pessoa
   SET
    idPessoa = :idPessoa,
    Nome = Nome,
    Email = :Email,
    Celular = :Celular:,
    senha = senha:
   WHERE 
    idPessoa = :idPessoa;";

    $consulta = Conexao::prepare($sql);
	$consulta->bindvalue('idPessoa',$obj->idPessoa);
	$consulta->bindvalue('nome',$obj->nome);
	$consulta->bindvalue('email',$obj->email);
	$consulta->bindvalue('celular',$obj->celular);
	$consulta->bindvalue('senha',$obj->senha);
	$consulta->bindvalue('idPessoa',$obj->idPessoa);
	return $consulta->execute();
}

public function delete($obj,$id = null){
		$sql =  "DELETE FROM pessoa WHERE idPessoa = :idPessoa";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('idPessoa',$idPessoa);
		$consulta->execute();
	}

	public function find($id = null){
        $sql =  "SELECT * FROM pessoa WHERE idPessoa = :idPessoa";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('idPessoa',$idPessoa);
        $consulta->execute();
	}

	public function findAll(){
		$sql = "SELECT * FROM pessoas";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}



















 ?>	