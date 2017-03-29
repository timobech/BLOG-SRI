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
<link href="css/style.css" rel="stylesheet" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="css/cubeportfolio.min.css" rel="stylesheet" />

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
					<li class="active">Liste des articles</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<!-- Arborescence -->
	
	<!-- CONTENU -->
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<aside class="left-sidebar">
				<div class="widget">
					<form role="form" method="post" action="../controllers/recherche.php">
					  <div class="form-group">
						<div class="row">
						<input type="text" class="form-control col-lg-3" id="s" name="search" placeholder="Rechercher..." style="width:auto;margin-right:2px"/>
						<button  type="submit" class= "btn btn-default col-lg-2"><i class="fa fa-search"></i></button>
					  </div>
					  </div>
					</form>
				</div>
				<div class="widget">
					<h5 class="widgetheading">Categories</h5>
					<ul class="cat">
					<?php foreach($res_categ as $elem_categ){ ?>
						<li><i class="fa fa-angle-right"></i><a href="../controllers/recherche.php?categ=<?php echo $elem_categ['id_categ'];?> "><?php echo $elem_categ['intitu_categ']; ?></a></li>
					<?php }?>
					</ul>
				</div>
				</aside>
			</div>
			
			<div class="col-lg-8">
			<?php 
			if(isset($_POST['search']))
					{
						echo '<h3><small>Résultats pour : </small>'.htmlspecialchars($_POST['search']).'</h3>';
						echo '<hr class="colorgraph">';
				
					}
			foreach($res_article as $elem) {?>
				
				<article style="margin-bottom:145px;">
						<div class="post-image">
							<div class="post-heading">
								<h3><a href="#"><?php echo $elem['titre']; ?></a></h3>
							</div>
							<img src="img/dummies/blog/img1.jpg" alt="" class="img-responsive" />
						</div>
						<p>
							<?php echo $elem['descript']; ?>
						</p>
						<div class="bottom-article">
							
							<a href="../controllers/res.php?article=<?php echo $elem['id_article']; ?>" class="readmore pull-right">Plus de détails <i class="fa fa-angle-right"></i></a>
						</div>
				</article>
			<?php }?>
			
				
				
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
<script>//$('#myModal').modal({
  //backdrop: 'static',
 // keyboard: false
//}); </script>
<?php include('../views/modals.php');?>
</body>
</html>