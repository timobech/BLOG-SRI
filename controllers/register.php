<?php
include_once('../modeles/Users.class.php');
include_once('../securimage/securimage.php');
$securimage = new Securimage();

$captcha_flag=false;
$pass_flag=false;
$empty_flag=false;
if(isset($_POST['register']))
{
	
	$pass = $_POST['password'];
	if($_POST['password']==$_POST['password_confirmation'] && strlen($pass)>=6 && $securimage->check($_POST['captcha_code']) && !empty($_POST['login_name'])&& !empty($_POST['last_name'])&& !empty($_POST['first_name']))
	{
		echo $securimage->check($_POST['captcha_code']);
		Users::createNewObject(htmlspecialchars($_POST['first_name']),htmlspecialchars($_POST['last_name']),htmlspecialchars($_POST['login_name']),$_POST['password'],2);
		$error_AUTH=false;
		$access=true;
		include_once('../views/connect.php');
	}
	else
	{
		$access=true;
		if(!$securimage->check($_POST['captcha_code']))
		{
			$captcha_flag = true;
		}
		if(strlen($pass)<6)
		{
		    $pass_flag = true;
		}
		if(empty($_POST['login_name']) || empty($_POST['last_name']) || empty($_POST['first_name']))
		{
		    $empty_flag = true;
		}
		//echo "$captcha_flag, $empty_flag, $pass_flag";
		$login = htmlspecialchars($_POST['login_name']);
		$nom =  htmlspecialchars($_POST['first_name']);
		$prenom =  htmlspecialchars($_POST['last_name']);
		include_once('../views/register.php');
	}
}
else
{
	$access=true;
	include_once('../views/register.php');
}
?>

