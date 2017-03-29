<?php
session_start();
include_once('../modeles/Users.class.php');
include_once('../modeles/Article.class.php');
include_once('../modeles/Categorie.class.php');
$i=0;
if(!isset($_GET['error']))
{
	$home=false;
	$access=true;
	if(isset($_GET['action']))
	{
		switch($_GET['action'])
		{
			case 'discon':
			if(isset($_GET['token']) && isset($_SESSION['token'])){
				if($_SESSION['token']==$_GET['token']){
					session_unset(); 
					include_once('../views/index.php');	
				}
				else{
					include_once('../views/error.php');
					die();
				}
				break;
			}
			default: 
				include_once('../views/error.php');
			
		}
	}
	//else
		//include_once('../views/error.php');	
	if(isset($_POST['connect']))
	{
		$hashed_pass = hash('sha512',$_POST['pass']);
		$user_conn = Users::checkUser($_POST['login'],$hashed_pass);
		if($user_conn)
		{
			
			$_SESSION['token'] = uniqid();
			//setcookie('token',$_SESSION['token'],time()+3600);
			$_SESSION['token_time'] = time(); 
			$_SESSION['idUser'] = $user_conn[0]['id_user'];
			$_SESSION['profile'] = $user_conn[0]['profil_type'];
			$_SESSION['login'] = $user_conn[0]['login'];
			$_SESSION['nom'] = htmlspecialchars($user_conn[0]['nom'].' '.$user_conn[0]['prenom']);
			if($_SESSION['profile']==1)
			{
				$categs = Categorie::getList();
				$artcl = Article::getList();
				$users = Users::getList();	
			}
			//echo $_SESSION['token'];
			include_once('../views/index.php');	
		}
		else
		{
			$error_AUTH=true;
			include_once('../views/connect.php');
		}
	}
	if(!isset($_POST['connect']) && !isset($_GET['action']))
	{
		if(isset($_SESSION['profile'])){
		if($_SESSION['profile']==1)
			{
				
				$categs = Categorie::getList();
				$artcl = Article::getList();
				$users = Users::getList();	
			}
		}
		if(!isset($_POST['add_article']))
		{
			include_once('../views/index.php');	
		}
	}
	if(isset($_POST['add_article']))
	{
		if(isset($_SESSION['idUser']))
		{ 
			echo 
			Article::createNewObject($_POST['titre'],$_POST['Description'],$_SESSION['idUser'],$_POST['categ'][0]);
		} 
		header('Location:../controllers/res.php?article='.$db->lastInsertId());	
		
	}
	
}
else
{
	$access=true;
	include_once('../views/error.php');
}


?>