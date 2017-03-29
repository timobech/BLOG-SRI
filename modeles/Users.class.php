<?php
require_once('../modeles/connectDB.php');
$db = new connectDB();
class Users 
{

	private $_profil_type=null;
	private $_nom=null;
	private $_prenom=null;
	private $_login=null;
	private $_pass=null;

	public function __construct()
	{
		$_intitu_categ = null;
	} 
	public static function  getObject($id) 
	{
		global $db;
		$rqst = $db->prepare("SELECT * FROM users WHERE id_user = :user");
		$rqst->bindParam(':user',$id,PDO::PARAM_INT);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	public static function getList($condition=NULL) 
	{
		global $db;
		$SQL = "SELECT * FROM users ";
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
	public static function checkUser($log,$passwrd)
	{
		global $db;
		$rqst = $db->prepare("SELECT * FROM users  WHERE login= ? AND pass= ?");
		$rqst->bindParam(1,$log,PDO::PARAM_STR);
		$rqst->bindParam(2,$passwrd,PDO::PARAM_STR);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		
		return $rs;
	}
	public static function getUsers_FrmComment($artcl)
	{	global $db;
		$rqst = $db->prepare("SELECT u.id_user,u.nom,u.prenom,u.login,c.id_comm,c.message,c.when_com FROM users u, comment c WHERE id_user=users AND c.article= ? ");
		$rqst->bindParam(1,$artcl,PDO::PARAM_INT);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		
		return $rs;
		
	}
		public static function getUsers_FrmArtcl($artcl)
	{	global $db;
		$rqst = $db->prepare("SELECT u.id_user,u.nom,u.prenom,u.login,a.id_article FROM users u, article a WHERE u.id_user=a.auteur AND a.id_article = ? ");
		$rqst->bindParam(1,$artcl,PDO::PARAM_INT);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		
		return $rs;
		
	}
	public static function createNewObject($nom,$prenom,$login,$pass,$profil) 
	{
		global $db;
		$rqst = $db->prepare("INSERT INTO users (nom,prenom,login,pass,profil_type) VALUES (?,?,?,?,?)");
		$rqst->bindValue(1,$nom,PDO::PARAM_STR);
		$rqst->bindValue(2,$prenom,PDO::PARAM_STR);
		$rqst->bindValue(3,$login,PDO::PARAM_STR);
		$rqst->bindValue(4,hash('sha512',$pass),PDO::PARAM_STR);
		$rqst->bindValue(5,$profil,PDO::PARAM_INT);
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
	}
	public function deleteObject($id) 
	{
		global $db;
		$rqst = $db->prepare("DELETE FROM users WHERE id_user = ?");
		$rqst->bindValue(1,$id,PDO::PARAM_INT);
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
	}

}
?>