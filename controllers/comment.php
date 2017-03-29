<?php 
session_start();
include_once('../modeles/Comment.class.php');
if(isset($_POST['pid']) && $_SESSION['token']==$_GET['token'])
	Comment::deleteObject($_POST['pid']);

?>