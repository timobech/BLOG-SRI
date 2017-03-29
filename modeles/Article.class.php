<?php
require_once('../modeles/connectDB.php');
$db = new connectDB();
class Article 
{

	private $_titre;
	private $_descript;
	private $_auteur;
	private $_categ;


	public function __construct()
	{
		$_titre = null;
		$_descript = null;
		$_auteur = 0;
		$_categ = 0;
		
	} 
	public static function getObjectById($id) 
	{
		global $db;
		$rqst = $db->prepare("SELECT * FROM article WHERE id_article = :article ");
		$rqst->bindParam(':article',$id,PDO::PARAM_INT);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	public static function getList($param=null) 
	{
		global $db;
		$SQL = "SELECT * FROM article ";
		if($param!=NULL)
		{
			$SQL .= 'WHERE descript like \'%'.$param.'%\' OR titre like \'%'.$param.'%\' ';
		
		}
		$rqst = $db->prepare($SQL); 
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	public static function getList_($param)
	{
		global $db;
		$SQL = "SELECT * FROM article WHERE id_categ=?";
		$rqst = $db->prepare($SQL);
		$rqst->bindValue(1,$param,PDO::PARAM_STR);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
		
		
	public function _updateDB($id,$titre,$desc) 
	{
		$SQL = "UPDATE article SET titre= ? AND descript=? WHERE id_article=? ";
		$rqst = $db->prepare($SQL);
		$rqst->bindValue(1,$titre_,PDO::PARAM_STR);
		$rqst->bindValue(2,$desc,PDO::PARAM_STR);
		$rqst->bindValue(3,$id,PDO::PARAM_INT);
		$rqst->execute();
		return $rs;
	}

	public static function createNewObject($titre_,$desc,$auteur_,$categ) 
	{
		global $db;
		$rqst = $db->prepare("INSERT INTO article (titre,descript,auteur,id_categ) VALUES (?,?,?,?)");
		$rqst->bindValue(1,$titre_,PDO::PARAM_STR);
		$rqst->bindValue(2,$desc,PDO::PARAM_STR);
		$rqst->bindValue(3,$auteur_,PDO::PARAM_INT);
		$rqst->bindValue(4,$categ,PDO::PARAM_INT);	
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
	}
	public static function deleteObject($id) 
	{
		global $db;
		$rqst = $db->prepare("DELETE FROM article WHERE id_article = ?");
		$rqst->bindValue(1,$id,PDO::PARAM_INT);
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
		
	}
}
?>