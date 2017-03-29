<?php

require_once('../modeles/connectDB.php');
$db = new connectDB();
class Profil 
{
	private $_intut_profil=null;
	
	public function __construct()
	{
		$_intitu_categ = null;
	} 
	public function getObject($id) 
	{
		global $db;
		$rqst = $db->prepare("SELECT * FROM profil WHERE id_profil = :profil ");
		$rqst->bindParam(':profil',$id,PDO::PARAM_INT);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	public function getList($condition=NULL) 
	{
		global $db;
		$SQL = "SELECT * FROM profil ";
		if($condition!=NULL)
		{
			$SQL .= " WHERE $condition ";
		}	
		$rqst = $db->prepare($SQL);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	public function _updateDB($debug=NULL) 
	{
		/*$SQL = "UPDATE article SET ";
		$rqst = $db->prepare($SQL);
		$rqst->execute();
		return $rs;*/
	}

	public static function createNewObject($inti_profil) 
	{
		global $db;
		$rqst = $db->prepare("INSERT INTO profil (intut_profil) VALUES (?)");
		$rqst->bindValue(1,$inti_profil,PDO::PARAM_STR);
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
	}
	public function deleteObject($id) 
	{
		global $db;
		$rqst = $db->prepare("DELETE FROM profil WHERE id_profil = ?");
		$rqst->bindValue(1,$id,PDO::PARAM_INT);
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
	}
}
Profil::createNewObject('test');
?>

