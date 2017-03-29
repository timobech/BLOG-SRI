<?php

require_once('../modeles/connectDB.php');
$db = new connectDB();

class Categorie 
{
	private $_intitu_categ=null;
	
	public function __construct()
	{
		$_intitu_categ = null;
	} 
	public static function getObject($id) 
	{
		global $db;
		$rqst = $db->prepare("SELECT * FROM categorie WHERE id_categ = :categ ");
		$rqst->bindParam(':categ',$id,PDO::PARAM_INT);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	public static function getList($condition=NULL,$order_by_and_or_limit=NULL,$debug=NULL) 
	{
		global $db;
		$SQL = "SELECT * FROM categorie ";
		if($condition!=NULL)
		{
			$SQL .= " WHERE $condition";
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

	public static function createNewObject($inti_categ) 
	{
		global $db;
		$rqst = $db->prepare("INSERT INTO categorie (intitu_categ) VALUES (?)");
		$rqst->bindValue(1,$inti_categ,PDO::PARAM_STR);
		if($rqst->execute())
		{
			return 1;
		}
	 print_r($db->errorInfo());
		return 0;
	}
	public function deleteObject($id) 
	{
		global $db;
		$rqst = $db->prepare("DELETE FROM article WHERE id_categ = ?");
		$rqst->bindValue(1,$id,PDO::PARAM_INT);
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
	}
}
//echo Categorie::createNewObject('Technologie & HighTech');
?>
