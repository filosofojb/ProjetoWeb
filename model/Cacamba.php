<?php 
class CACAMBA{
	private $id;
	private $situacao;
	private $coodernadaX;
	private $coodernadaY;


public __construct($id,$situacao,$coodernadaX,$coodernadaY)
{	
this->id=$id;
this->situacao=$situacao;
this->coodernadaX=$coodernadaX;
this->coodernadaY=$coodernadaY;
}

public function getID()
{
	return this->id;
}
public function getSituacao()
{
	return this->situacao;
}
public function getX()
{
	return this->coodernadaX;
}

public function getY()
{
	return this->coodernadaY;
}

public function setID($id)
{
	this->id=$id;
}
public function setSituacao($situacao)
{
	this->situacao=$situacao;
}
public function SetX($X)
{
	this->coodernadaX=$X;
}
public function setY($Y)
{
this->coodernadaY=$Y;
}





































} 

 ?>

