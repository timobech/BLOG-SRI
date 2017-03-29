<?php 
session_start();
$delete_ok=0;
include_once('../modeles/Article.class.php');
include_once('../modeles/Comment.class.php');
include_once('../modeles/Users.class.php');
include_once('../modeles/Categorie.class.php');				
if(isset($_POST['envoyer']) && isset($_SESSION['idUser']))
{
	$message = htmlspecialchars($_POST['message']);
	Comment::insertComment($message,$_GET['article'],$_SESSION['idUser']);
	//header('Location:../controllers/res.php?article=4');
}
if(isset($_GET['article']))
{
	if(isset($_GET['action']) && isset($_GET['token']) )
	{	
		if($_GET['action']='delete' && $_GET['token']==$_SESSION['token'])
			$delete_ok = Article::deleteObject($_GET['article']);
	}
	$id_art = $_GET['article'];
	$article = Article::getObjectById($id_art);
	// echo $id_art;
	 //print_r($comments_biss);
	 if($article){
	
	$categ = Categorie::getObject($article[0]['id_categ']);
	$comments = Comment::getList($id_art);
	$comments_bis = Users::getUsers_FrmComment($_GET['article']);
	$auteur = Users::getUsers_FrmArtcl($_GET['article']);
		 $access=true;
		include('../views/res.php');
	 }
	else{
		//$error_call = true;
		$access=true;
		if(isset($delete_ok))
		{
			if($delete_ok)
			{
				$categs = Categorie::getList();
				$artcl = Article::getList();
				$users = Users::getList();	
				include('../views/index.php');
			}
			else{include('../views/error.php');}
		} 	
		
			
	}
}
else{
	$access=true;
	include('../views/error.php');
}





?>