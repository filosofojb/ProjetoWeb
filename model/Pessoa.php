<?php 
public class Pessoa{
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




















 ?>	