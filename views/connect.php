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
					<li class="active">Connexion</li>
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
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" class="register-form" method="post" action="../controllers/connect.php">
		<?php 
		if(isset($error_AUTH))
		{
			if($error_AUTH)
			{
				echo '<div class="alert alert-danger">
				<strong>Indentifiant eronné</strong> Veuillez 
				re-essayer...</div>';
			}
			else
			{
				echo'<div class="alert alert-success">
				<strong>Vous êtes inscris</strong> Veuillez saisir login/password pour vous connecter...
				</div>';
			}
		}
		?> 
		
			<h3>Connectez vous </h3>
			<hr class="colorgraph">

			<div class="form-group">
				<input type="login" name="login" class="form-control input-lg" placeholder="Login" tabindex="4">
			</div>
			<div class="form-group">
				<input type="password" class="form-control input-lg" id="pass" name="pass" placeholder="Password">
			</div>

			
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" name="connect" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				
			</div>
		</form>
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
   url: "../controllers/comment.php",
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