<?php
session_start();
include_once("../modeles/Article.class.php");
include_once("../modeles/Categorie.class.php");
$access=true;
$res_categ = Categorie::getList();
if(isset($_POST['search']))
{
	
	$res_article = Article::getList($_POST['search']);
	include_once("../views/recherche.php");
}	
else {
if(isset($_GET['categ']))
{  
	$res_article = Article::getList_($_GET['categ']);
	//$ok=0
	if($res_article)
		include_once("../views/recherche.php");
	else
		include("../views/error.php");
}
else
{
	$res_article = Article::getList();
	include_once("../views/recherche.php");
}
}
/*echo '<pre>';
print_r($res);
echo '</pre>';*/
	

?>

 