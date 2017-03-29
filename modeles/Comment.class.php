<?php

require_once('../modeles/connectDB.php');
$db = new connectDB();
class Comment 
{
	public static function insertComment($mess,$artcl,$user)
	{
		global $db;
		$rqst = $db->prepare("INSERT INTO comment (message,article,users) VALUES (?,?,?)");
		$rqst->bindValue(1,$mess,PDO::PARAM_STR);
		$rqst->bindValue(2,$artcl,PDO::PARAM_STR);
		$rqst->bindValue(3,$user,PDO::PARAM_INT);
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
	}
	
	public static function getList($id)
	{
		global $db;
		$rqst = $db->prepare("SELECT * FROM comment WHERE article=?");
		$rqst->bindValue(1,$id,PDO::PARAM_INT);
		$rqst->execute();
		$rs = $rqst->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	public static function deleteObject($id)
	{
		global $db;
		$rqst = $db->prepare("DELETE FROM comment WHERE id_comm = ?");
		$rqst->bindValue(1,$id,PDO::PARAM_INT);
		if($rqst->execute())
		{
			return 1;
		}
		return 0;
	}
}