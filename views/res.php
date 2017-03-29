<?php
if(empty($access)) {
    header("location:../controllers/connect.php?error=true"); 
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <base href="../views/"> 
<meta charset="utf-8">
<title>EE</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />

<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="css/cubeportfolio.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<!--utils-->
<link id="t-colors" href="skins/default.css" rel="stylesheet" />
<link id="bodybg" href="bodybg/bg4.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="wrapper">
	<?php include('header.php');?>
	
	<!-- Arborescence -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a></li>
					<li class="active">Fiche article</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<!-- Arborescence -->
	<!-- CONTENU -->
		<section id="content">
		
	<div class="container">
	
	<?php if(isset($_SESSION['profile'])){
		echo '<script type="text/javascript">var token ='.json_encode($_SESSION['token']).';</script>';
		if($_SESSION['profile'] ==1)
		{?>
	<a class="btn btn-default" href="../controllers/res.php?article=<?php echo $article[0]['id_article'].'&action=delete&token='.$_SESSION['token'];?>"><i class="fa fa-times"></i> Supprimer l'article</a>
	<?php }} ?>
		<div class="row">
		
			<div class="col-lg-8">
				<h3><?php echo $article[0]['titre']; ?></h3>
				<img src="img/dummies/dummy-1200.jpg" alt="" class="img-responsive" />
	
			
		
		<p>
		<?php echo $article[0]['descript']; ?>
		
		</p>
		
		 <hr class="colorgraph">
		 <h3>Commentaires sur le produit</h3>
		 <?php 
		 
		 foreach($comments_bis as $comm){
		 $tags =  '<div class="comment" id="commentwrap-'.$comm['id_comm'].'"  style="margin-bottom:20px; border:1px solid #B91919; border-radius:20px; ;padding:27px;box-shadow:3px 5px 9px 3px">
		 
		  <div class="row">
		  <div class="col-lg-8">
		<h5>'.$comm['login'].'<small> <i class="fa fa-clock-o"></i> '.$comm['when_com'].'</small></h5>
		</div>';
		if(isset($_SESSION['profile'])){ 
		if($_SESSION['profile'] ==1)
		{
			$tags.='<div class="cool-lg-4" style="margin-right:20px;" onclick="delete_('.$comm['id_comm'].');"> 
			<a href="javascript:" alt="supprimer le commetaire" ><i class="fa fa-2x fa-times pull-right" ></i></a></div>';
		}}
		$tags.='</div><hr>
		 '.$comm['message'].'
		 </div>';
		 echo $tags;
		 }
		 ?>
		 <?php if(isset($_SESSION['idUser'])){?>
		  <hr class="colorgraph"/>
		
			
			    <h2>Laissez un commmentaire <small>(Appréciations)</small></h2>
			   
                <div id="errormessage"></div>
                <form action="../controllers/res.php?article=<?php echo $_GET['article'];?>" method="post" role="form" class="contactForm">
                    
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validation"></div>
                    </div>
                    
                    <div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md" name="envoyer">Envoyer</button></div>
                </form>
               
		 <?php }?>
		
		
		</div>
		
			<div class="col-lg-4">
				<aside class="right-sidebar">
				
				<div class="widget">
					<h5 class="widgetheading">Auteur de l'article </h5>
					<ul class="cat">
						<li><i class="fa fa-angle-right"></i><?php echo $auteur[0]['login'] ?></li>
						</i><h6><?php echo $auteur[0]['nom'].' '.$auteur[0]['prenom'] ?></h6>
					
					</ul>
				</div>
				
				
				</aside>
			</div>
			<div class="col-lg-4">
				<aside class="right-sidebar">
				
				<div class="widget">
					<h5 class="widgetheading">Categorie d'article </h5>
					<ul class="cat">
						<li><i class="fa fa-angle-right"></i><?php echo $categ[0]['intitu_categ'] ?></li>
						
					
					</ul>
				</div>
				
				
				</aside>
			</div>
			
		</div>


	</div>
	</section>
	<!-- CONTENU -->
	<?php include('footer.html');?>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- -->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script> 
<script src="plugins/flexslider/flexslider.config.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/stellar.js"></script>
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script src="js/jquery.cubeportfolio.min.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
function delete_(pid){
$.ajax({
   type: "POST",
   url: "../controllers/comment.php?token="+token,
   data: "pid="+pid,
   success: function(){
   $("#commentwrap-"+pid).hide(100);
   }
 });
}
</script>

<?php include('modals.php');?>
</body>
</html>