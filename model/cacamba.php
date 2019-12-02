<?php 
include __DIR__.'Conexao.php';
class cacamba extends Conexao{
	private $id;
	private $situacao;

public __construct($id,$situacao,)
{	
this->id=$id;
this->situacao=$situacao;

}

public function getID()
{
	return this->id;
}
public function getSituacao()
{
	return this->situacao;
}
public function setID($id)
{
	this->id=$id;
}
public function setSituacao($situacao)
{
	this->situacao=$situacao;
}

public function insert($obj){
	$sql="INSERT INTO 'Cacamba'(idCacamba,SitacaoCacamba) VALUES(:idCacamba,:situacao);";
	$consulta = Conexao::prepare($sql);
	$consulta->bindvalue('idCacamba',$obj->idCacamba);
	$consulta->bindvalue('SitacaoCacamba',$obj->situacao);
	$consulta->execute();
	return Conexao::lastId();
}
public function update(){
	$sql=
	"UPDATE 
	 Cacamba 
	 SET
     idCacamba = :idCacamba,
     SitacaoCacamba = :SitacaoCacamba 
     WHERE 
     idCacamba = :idCacamba;";
     $consulta = Conexao::prepare($sql);
	 $consulta->bindvalue('idCacamba',$obj->idCacamba);
	 $consulta->bindvalue('SitacaoCacamba',$obj->situacao);
	 return $consulta->execute();
}
public function delete(){
	$sql="DELETE FROM Cacamba
WHERE idCacamba = :idCacamba;
"
$consulta=Conexao::prepare($sql);
$consulta=bindvalue('idCacamba',$idCacamba);
$consulta->execute();
}
public function find($id=null){
	$sql="SELECT * FROM cacamba WHERE idCacamba = :idCacamba";
	$consulta = Conexao::prepare($sql);
	$consulta->bindValue('idCacamba',$idCacamba);
	$consulta->execute();
}
public function findall(){
	$sql = "SELECT * FROM cacamba";
	$consulta = Conexao::prepare($sql);
	$consulta->execute();
}
































} 

 ?>

